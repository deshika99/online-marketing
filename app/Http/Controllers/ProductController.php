<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\ProductImage;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{
    public function show(Request $request)
    {
        $title = $request->query('title');
        $image = $request->query('image');
        $price = $request->query('price');

        return view('single_product_page', compact('title', 'image', 'price'));
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
        return view('admin_dashboard.edit_products', compact('product', 'categories'));
    }
    

    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect()->route('products')->with('success', 'Product deleted successfully.');
    }

  



    public function update(Request $request, $id)
{
    $request->merge([
        'affiliateProduct' => $request->has('affiliateProduct') ? true : false,
    ]);

    $validatedData = $request->validate([
        'productName' => 'required|string|max:255',
        'productDesc' => 'required|string',
        'productImages.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Multiple images
        'normalPrice' => 'required|numeric|min:0',
        'affiliateProduct' => 'nullable|boolean',
        'affiliatePrice' => 'nullable|numeric|min:0',
        'commissionPercentage' => 'nullable|numeric|min:0|max:100',
        'totalPrice' => 'required|numeric|min:0',
        'category' => 'required|string',
        'deleteImages' => 'nullable|array',
        'deleteImages.*' => 'nullable|numeric|exists:product_images,id', // Image IDs to delete
    ]);

    $product = Products::findOrFail($id);

    $product->update([
        'product_name' => $validatedData['productName'],
        'product_description' => $validatedData['productDesc'],
        'normal_price' => $validatedData['normalPrice'],
        'is_affiliate' => $request->input('affiliateProduct'),
        'affiliate_price' => $validatedData['affiliatePrice'] ?? null,
        'commission_percentage' => $validatedData['commissionPercentage'] ?? null,
        'total_price' => $validatedData['totalPrice'],
        'product_category' => $validatedData['category'],
    ]);

    // Delete selected images
    if ($request->has('deleteImages')) {
        foreach ($request->input('deleteImages') as $imageId) {
            $image = ProductImage::find($imageId);
            if ($image) {
                // Delete the file from storage
                if (Storage::exists('public/' . $image->image_path)) {
                    Storage::delete('public/' . $image->image_path);
                }
                $image->delete();
            }
        }
    }

    // Handle new images
    if ($request->hasFile('productImages')) {
        foreach ($request->file('productImages') as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName(); // Unique name
            $imagePath = $image->storeAs('product_images', $imageName, 'public');

            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => $imagePath,
            ]);
        }
    }

    return redirect()->route('products')->with('success', 'Product updated successfully!');
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
        'quantity' => 'nullable|numeric',
    ]);

    $product = Products::create([
        'product_name' => $request->input('productName'),
        'product_description' => $request->input('productDesc'),
        'normal_price' => $request->input('normalPrice'),
        'is_affiliate' => $request->input('affiliateProduct'),
        'affiliate_price' => $request->input('affiliatePrice'),
        'commission_percentage' => $request->input('commissionPercentage'),
        'total_price' => $request->input('totalPrice'),
        'product_category' => $request->input('category'), 
        'quantity' => $request->input('quantity'),
    ]);

    if ($request->hasFile('productImages')) {
        foreach ($request->file('productImages') as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('product_images', $imageName, 'public');

            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => $imagePath,
            ]);
        }
    }

    return redirect()->route('products')->with('success', 'Product added successfully!');
}


    
    
    public function showCategory()
    {
        $categories = Category::all(); 
        return view('admin_dashboard.add_products', compact('categories'));
    }



}
