<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Variation;
use App\Models\VariationImage;
use App\Models\SubSubcategory;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{



    public function showProductsByCategory($category = null, $subcategory = null, $subsubcategory = null)
    {
        $query = Products::with('images');

        if ($subsubcategory) {
            $query->where('sub_subcategory', $subsubcategory);
        } elseif ($subcategory) {
            $query->where('subcategory', $subcategory);
        } elseif ($category) {
            $query->where('product_category', $category);
        }

        $products = $query->get();

        return view('user_products', [
            'products' => $products,
            'category' => $category,
            'subcategory' => $subcategory,
            'subsubcategory' => $subsubcategory
        ]);
    }

    
    public function show($product_id)
    {
        $product = ProductS::with('images')->where('product_id', $product_id)->firstOrFail();
        return view('single_product_page', compact('product'));
    }
    

    
    

    public function showProducts()
    {
        $categories = Category::all();
        $products = Products::with(['category', 'images'])->get();
    
        return view('admin_dashboard.products', compact('categories', 'products'));
    }
    
    
    
    public function edit($id)
    {
        $product = Products::findOrFail($id);
        $categories = Category::all();
        
        $selectedCategoryId = Category::where('parent_category', $product->product_category)->value('id');
        $selectedSubcategoryId = Subcategory::where('subcategory', $product->subcategory)->value('id');
        $subcategories = $selectedCategoryId ? Subcategory::where('category_id', $selectedCategoryId)->get() : collect();
        $subSubcategories = $selectedSubcategoryId ? SubSubcategory::where('subcategory_id', $selectedSubcategoryId)->get() : collect();
        
        $variations = Variation::where('product_id', $product->product_id)->get();
        
        return view('admin_dashboard.edit_products', compact('product', 'categories', 'subcategories', 'subSubcategories', 'selectedCategoryId', 'selectedSubcategoryId', 'variations'));
    }

    



    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect()->route('products')->with('status', 'Product deleted successfully.');
    }

  

    public function update(Request $request, $id)
    {
        $request->merge([
            'affiliateProduct' => $request->has('affiliateProduct') ? true : false,
        ]);
    
        $validatedData = $request->validate([
            'productName' => 'required|string|max:255',
            'productDesc' => 'required|string',
            'productImages.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'normalPrice' => 'required|numeric|min:0',
            'affiliateProduct' => 'nullable|boolean',
            'affiliatePrice' => 'nullable|numeric|min:0',
            'commissionPercentage' => 'nullable|numeric|min:0|max:100',
            'totalPrice' => 'required|numeric|min:0',
            'quantity' => 'nullable|numeric|min:0',
            'category' => 'required|integer|exists:categories,id',
            'subcategory' => 'nullable|integer|exists:subcategories,id',
            'subsubcategory' => 'nullable|integer|exists:sub_subcategories,id',
            'deleteImages' => 'nullable|array',
            'deleteImages.*' => 'nullable|numeric|exists:product_images,id',
            'variation' => 'nullable|array',
            'variation.*.id' => 'nullable|integer|exists:variations,id',
            'variation.*.type' => 'nullable|string',
            'variation.*.value' => 'nullable|string',
        ]);
    
        $product = Products::findOrFail($id);
    
        $categoryName = Category::find($validatedData['category'])->parent_category ?? '';
        $subcategoryName = Subcategory::find($validatedData['subcategory'])->subcategory ?? '';
        $subsubcategoryName = SubSubcategory::find($validatedData['subsubcategory'])->sub_subcategory ?? '';
    
        $product->update([
            'product_name' => $validatedData['productName'],
            'product_description' => $validatedData['productDesc'],
            'normal_price' => $validatedData['normalPrice'],
            'is_affiliate' => $request->input('affiliateProduct'),
            'affiliate_price' => $validatedData['affiliatePrice'] ?? null,
            'commission_percentage' => $validatedData['commissionPercentage'] ?? null,
            'total_price' => $validatedData['totalPrice'],
            'quantity' => $validatedData['quantity'],
            'product_category' => $categoryName,
            'subcategory' => $subcategoryName,
            'sub_subcategory' => $subsubcategoryName,
        ]);
    
        if ($request->has('deleteImages')) {
            foreach ($request->input('deleteImages') as $imageId) {
                $image = ProductImage::find($imageId);
                if ($image) {
                    if (Storage::exists('public/' . $image->image_path)) {
                        Storage::delete('public/' . $image->image_path);
                    }
                    $image->delete();
                }
            }
        }
    
        if ($request->hasFile('productImages')) {
            foreach ($request->file('productImages') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('product_images', $imageName, 'public');
    
                ProductImage::create([
                    'product_id' => $product->product_id,
                    'image_path' => $imagePath,
                ]);
            }
        }
    
        $existingVariationIds = $product->variations->pluck('id')->toArray();
        $submittedVariationIds = array_column($request->input('variation', []), 'id'); 
    
        foreach ($request->input('variation', []) as $variation) {
            if (isset($variation['id']) && in_array($variation['id'], $existingVariationIds)) {
                $existingVariation = Variation::find($variation['id']);
                $existingVariation->update([
                    'type' => $variation['type'],
                    'value' => $variation['value'],
                ]);
            } else {
                Variation::create([
                    'product_id' => $product->product_id,
                    'type' => $variation['type'],
                    'value' => $variation['value'],
                ]);
            }
        }
    
        $variationsToDelete = array_diff($existingVariationIds, $submittedVariationIds);
        Variation::whereIn('id', $variationsToDelete)->delete();
    
        return redirect()->route('products')->with('status', 'Product updated successfully!');
    }
    

    

    

public function store(Request $request)
{
    $request->merge([
        'affiliateProduct' => $request->has('affiliateProduct') ? true : false,
    ]);

    $request->validate([
        'productName' => 'required|string|max:255',
        'productDesc' => 'nullable|string',
        'productImages' => 'nullable|array',
        'productImages.*' => 'nullable|image|max:2048',
        'normalPrice' => 'required|numeric',
        'affiliateProduct' => 'required|boolean',
        'affiliatePrice' => 'nullable|numeric',
        'commissionPercentage' => 'nullable|numeric|min:0|max:100',
        'totalPrice' => 'required|numeric',
        'category' => 'required|string',
        'subcategory' => 'nullable|string',
        'subsubcategory' => 'nullable|string',
        'quantity' => 'nullable|numeric',
        'variation' => 'nullable|array',
        'variation.*.type' => 'nullable|string',
        'variation.*.value' => 'nullable|string',
    ]);

    $categoryName = Category::find($request->input('category'))->parent_category ?? '';
    $subcategoryName = Subcategory::find($request->input('subcategory'))->subcategory ?? '';
    $subsubcategoryName = SubSubcategory::find($request->input('subsubcategory'))->sub_subcategory ?? '';

    $product = Products::create([
        'product_name' => $request->input('productName'),
        'product_description' => $request->input('productDesc'),
        'normal_price' => $request->input('normalPrice'),
        'is_affiliate' => $request->input('affiliateProduct'),
        'affiliate_price' => $request->input('affiliatePrice'),
        'commission_percentage' => $request->input('commissionPercentage'),
        'total_price' => $request->input('totalPrice'),
        'product_category' => $categoryName,
        'subcategory' => $subcategoryName,
        'sub_subcategory' => $subsubcategoryName,
        'quantity' => $request->input('quantity'),
    ]);

    if ($request->hasFile('productImages')) {
        foreach ($request->file('productImages') as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('product_images', $imageName, 'public');

            ProductImage::create([
                'product_id' => $product->product_id,
                'image_path' => $imagePath,
            ]);
        }
    }

    $variations = $request->input('variation', []);
    foreach ($variations as $index => $variation) {
        try {
            $variationModel = Variation::create([
                'product_id' => $product->product_id,
                'type' => $variation['type'],
                'value' => $variation['value'],
            ]);
        } catch (\Exception $e) {
            
        }
    }

    return redirect()->route('products')->with('status', 'Product added successfully!');
}

    



    public function showCategory(Request $request)
    {
        $categories = Category::all();
        
        $selectedCategoryId = old('category', $request->input('category'));
        $selectedSubcategoryId = old('subcategory', $request->input('subcategory'));
        $subcategories = $selectedCategoryId ? Subcategory::where('category_id', $selectedCategoryId)->get() : collect();
    
        $subSubcategories = $selectedSubcategoryId ? SubSubcategory::where('subcategory_id', $selectedSubcategoryId)->get() : collect();
        return view('admin_dashboard.add_products', compact('categories', 'subcategories', 'subSubcategories', 'selectedCategoryId', 'selectedSubcategoryId'));
    }
    
    

    
    public function getSubcategories($categoryId)
    {
        $subcategories = Subcategory::where('category_id', $categoryId)->get(['id', 'subcategory as name']);
        return response()->json(['subcategories' => $subcategories]);
    }
    
    public function getSubSubcategories($subcategoryId)
    {
        $subSubcategories = SubSubcategory::where('subcategory_id', $subcategoryId)->get(['id', 'sub_subcategory as name']);
        return response()->json(['sub_subcategories' => $subSubcategories]);
    }
    
    

 



}
