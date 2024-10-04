<?php

namespace App\Http\Controllers;
use App\Models\CustomerOrder;
use App\Models\CustomerOrderItems;
use App\Models\User;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
   

    public function index()
    {
        $orderCount = CustomerOrder::count();
        $customerCount = User::where('role', 'customer')->count();
        $productCount = Products::count();
    
        // Fetch top 5 products based on order count
        $topProducts = CustomerOrderItems::select('product_id', DB::raw('count(*) as total_count'))
            ->groupBy('product_id')
            ->orderBy('total_count', 'desc')
            ->take(5)
            ->get()
            ->map(function ($item) {
                $product = Products::where('product_id', $item->product_id)->first();
    
                return [
                    'name' => $product ? $product->product_name : 'Unknown Product',
                    'count' => $item->total_count,
                ];
            });

    
        return view('admin_dashboard.index', compact('orderCount', 'customerCount', 'productCount', 'topProducts'));
    }
    

}




