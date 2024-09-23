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
    
        $inProgressOrders = $orders->where('status', 'Inprogress');
        $deliveredOrders = $orders->where('status', 'Delivered');
        $cancelledOrders = $orders->where('status', 'Cancelled');
    
        return view('member_dashboard.myorders', compact('orders', 'inProgressOrders', 'deliveredOrders', 'cancelledOrders'));
    }
    
}
