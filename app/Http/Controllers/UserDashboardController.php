<?php

namespace App\Http\Controllers;
use App\Models\CustomerOrder;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{


    public function myOrders()
    {
        $orders = CustomerOrder::with(['items.product'])
            ->where('user_id', auth()->id())
            ->get();
    
        $pendingOrders = $orders->where('status', 'Pending');
        $confirmedOrders = $orders->where('status', 'Confirmed');
        $inProgressOrders = $orders->where('status', 'In Progress');
        $shippedOrders = $orders->where('status', 'Shipped');
        $deliveredOrders = $orders->where('status', 'Delivered');
        $cancelledOrders = $orders->where('status', 'Cancelled');
    
        return view('member_dashboard.myorders', compact(
            'orders', 
            'pendingOrders', 
            'confirmedOrders', 
            'inProgressOrders', 
            'shippedOrders', 
            'deliveredOrders', 
            'cancelledOrders'
        ));
    }
    

    public function orderDetails($order_code)
    {
        $order = CustomerOrder::with(['items.product'])->where('order_code', $order_code)->first();
        if (!$order) {
            return redirect()->route('myorders')->with('error', 'Order not found');
        }
        return view('member_dashboard.order-details', compact('order'));
    }


    public function cancelOrder(Request $request, $order_code)
    {
        $order = CustomerOrder::where('order_code', $order_code)->first();
        if ($order) {
            $order->status = 'Cancelled';
            $order->save();

            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
    }


    public function confirmDelivery(Request $request)
    {
        $order = CustomerOrder::where('order_code', $request->order_code)->first();
        if ($order) {
            $order->status = 'Delivered';
            $order->save();

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }


    
}
