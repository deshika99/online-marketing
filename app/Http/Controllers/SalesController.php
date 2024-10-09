<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    // Show the form to create sales
    public function createSales()
    {

        $products = Products::select('product_id', 'product_name', 'normal_price')->get(); // Ensure you're selecting the correct column names

        return view('admin_dashboard.add_sales', compact('products'));
    }

    // Show the list of flash sales
    public function showSales()
    {
        // Retrieve sales with the associated product information

        $sales = Sale::with(['product.images'])->get(); 

        $sales = Sale::with(['product' => function($query) {
            $query->select('id', 'product_name', 'normal_price');
        }])->get();


        return view('admin_dashboard.flash_sales', compact('sales'));
    }
    
    // Store new sale
    public function storeSale(Request $request)
    {
        $data = $request->validate([
            'end_date' => 'required|date',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.normal_price' => 'required|numeric',
            'products.*.sale_rate' => 'required|numeric|min:0|max:100',
            'products.*.sale_price' => 'required|numeric',
        ]);

    
        foreach ($data['products'] as $product) {
            Sale::create([
                'product_id' => $product['product_id'],
                'normal_price' => $product['normal_price'],
                'sale_rate' => $product['sale_rate'],
                'sale_price' => $product['sale_price'],
                'end_date' => $data['end_date'],
                'status' => 'active',
            ]);
        }

        return redirect()->route('flash_sales')->with('status', 'Flash sales added successfully!');
    }

    // Edit a sale
    public function edit($id)
    {
        $sale = Sale::with('product')->findOrFail($id);
        return view('admin_dashboard.edit_sales', compact('sale'));
    }

    // Update a sale
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'end_date' => 'required|date',
            'sale_rate' => 'required|numeric|min:0|max:100',
            'status' => 'required|in:Active,Inactive',
        ]);

        $sale = Sale::findOrFail($id);
        $sale->end_date = $validatedData['end_date'];
        $sale->sale_rate = $validatedData['sale_rate'];
        $sale->status = $validatedData['status'];

        // Recalculate sale price based on normal price and sale rate
        $normalPrice = $sale->normal_price;
        $salePrice = $normalPrice - ($normalPrice * ($sale->sale_rate / 100));
        $sale->sale_price = $salePrice;

        $sale->save();

        return redirect()->route('flash_sales')->with('status', 'Sale updated successfully.');
    }

    // Delete a sale
    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('flash_sales')->with('status', 'Sale deleted successfully.');
    }
}
