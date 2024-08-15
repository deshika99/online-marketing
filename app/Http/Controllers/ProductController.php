<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


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
        $products = Products::all();
        return view('admin_dashboard.products', compact('products'));
    }

        public function edit($id)
    {
        $product = Products::findOrFail($id);
        return view('admin_dashboard.edit_products', compact('product'));
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
                'productImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
                'normalPrice' => 'required|numeric|min:0',
                'affiliateProduct' => 'nullable|boolean',
                'affiliatePrice' => 'nullable|numeric|min:0',
                'commissionPercentage' => 'nullable|numeric|min:0|max:100',
                'totalPrice' => 'required|numeric|min:0',
            ]);
    
            $product = Products::findOrFail($id);
    
            $product->product_name = $validatedData['productName'];
            $product->product_description = $validatedData['productDesc'];
            $product->normal_price = $validatedData['normalPrice'];
            $product->is_affiliate = $request->has('affiliateProduct') ? 1 : 0;
            $product->affiliate_price = $validatedData['affiliatePrice'] ?? null;
            $product->commission_percentage = $validatedData['commissionPercentage'] ?? null;
            $product->total_price = $validatedData['totalPrice'];
    
            if ($request->hasFile('productImage')) {
                $image = $request->file('productImage');
                $imageName = $image->getClientOriginalName();
                $imagePath = $image->storeAs('product_images', $imageName, 'public');
                $product->product_image = $imagePath; 
                Log::info('Image uploaded successfully: ' . $imagePath);
            }
    
            $product->save();  
            return redirect()->route('products', $id)->with('success', 'Product updated successfully!');
        
    }



    public function store(Request $request)
    {
            $request->merge([
                'affiliateProduct' => $request->has('affiliateProduct') ? true : false,
            ]);

            $request->validate([
                'productName' => 'required|string|max:255',
                'productDesc' => 'nullable|string',
                'productImage' => 'nullable|image|max:2048',
                'normalPrice' => 'required|numeric',
                'affiliateProduct' => 'required|boolean',
                'affiliatePrice' => 'nullable|numeric',
                'commissionPercentage' => 'nullable|numeric|min:0|max:100',
                'totalPrice' => 'required|numeric',
            ]);

        
            $imagePath = null;
            if ($request->hasFile('productImage')) {
                $image = $request->file('productImage');
                $imageName = $image->getClientOriginalName();
                $imagePath = $image->storeAs('product_images', $imageName, 'public');
            }

            Products::create([
                'product_name' => $request->input('productName'),
                'product_description' => $request->input('productDesc'),
                'product_image' => $imagePath,
                'normal_price' => $request->input('normalPrice'),
                'is_affiliate' => $request->input('affiliateProduct'),
                'affiliate_price' => $request->input('affiliatePrice'),
                'commission_percentage' => $request->input('commissionPercentage'),
                'total_price' => $request->input('totalPrice'),
            ]);

            return redirect()->route('products')->with('success', 'Product added successfully!');
    }
   

}
