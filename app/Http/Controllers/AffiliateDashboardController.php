<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Affiliate_Customer;

class AffiliateDashboardController extends Controller
{
    public function index()
    {
        $affiliateId = Session::get('customer_id');
        $customer = Affiliate_Customer::where('id', $affiliateId)->first();

        if ($customer && !empty($customer->promotion_method)) {
            $customer->promotion_method = json_decode($customer->promotion_method, true);  // Decode JSON to array
        }

        return view('affiliate_dashboard.mywebsites_page', compact('customer'));
    }

}
