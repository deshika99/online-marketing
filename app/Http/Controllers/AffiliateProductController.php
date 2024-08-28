<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class AffiliateProductController extends Controller
{
    public function showAdCenter(Request $request)
    {
        $categoryId = $request->get('category', 'all');
        $query = Products::where('is_affiliate', 1);
    
        if ($categoryId != 'all') {
            $query->where('product_category', $categoryId);
        }
    
        $hotDeals = $query->get();
        $commissionThreshold = 8;
        $highComQuery = Products::where('commission_percentage', '>', $commissionThreshold)
            ->where('is_affiliate', 1);
    
        if ($categoryId != 'all') {
            $highComQuery->where('product_category', $categoryId);
        }
    
        $highCom = $highComQuery->get();
        $categories = Category::all(); 
    
        return view('affiliate_dashboard.ad_center', compact('hotDeals', 'highCom', 'categories'));
    }
    

}
