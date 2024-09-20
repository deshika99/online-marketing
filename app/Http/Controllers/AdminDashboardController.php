<?php

namespace App\Http\Controllers;
use App\Models\CustomerOrder;
use App\Models\User;
use App\Models\Products;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
   

    public function index()
    {
        $orderCount = CustomerOrder::count();
        $customerCount = User::where('role', 'customer')->count();
        $productCount = Products::count();

        return view('admin_dashboard.index', compact('orderCount', 'customerCount', 'productCount'));
    }

}
