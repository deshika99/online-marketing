<?php

namespace App\Http\Controllers;
use App\Models\CustomerOrder;
use App\Models\CustomerOrderItems;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = CustomerOrder::all();
        return view('admin_dashboard.orders', compact('orders'));
    }


    public function destroy($id)
    {
        $order = CustomerOrder::findOrFail($id);
        $order->items()->delete();
        $order->delete();
    
        return redirect()->route('orders')->with('status', 'Order and related items deleted successfully');
    }
    

    
    public function setOrderCode(Request $request)
    {
        $request->session()->put('current_order_code', $request->input('order_code'));
        return response()->json(['success' => true]);
    }
    

    public function show()
    {
        $order_code = session('current_order_code');

        if (!$order_code) {
            return redirect()->route('orders')->with('error', 'No order code provided');
        }

        $order = CustomerOrder::where('order_code', $order_code)->firstOrFail();
        $items = $order->items()->with('product.images')->get(); 
        $totalQuantity = $items->sum('quantity');

        return view('admin_dashboard.order-details', compact('order', 'items', 'totalQuantity'));
    }

    
    
    


}
