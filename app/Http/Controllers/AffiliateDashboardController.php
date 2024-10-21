<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Affiliate_User;

class AffiliateDashboardController extends Controller
{
    public function index()
{
    // Get the affiliate ID from the session
    $affiliateId = Session::get('customer_id');

    // Fetch the customer from the database
    $customer = Affiliate_User::find($affiliateId);

    // Check if the customer exists and if the promotion method is set
    if ($customer && isset($customer->promotion_method)) {
        // Decode JSON to an array if promotion_method is not empty
        $customer->promotion_method = !empty($customer->promotion_method) 
            ? json_decode($customer->promotion_method, true) 
            : [];  // Default to an empty array if it's empty
    } else {
        // If the customer does not exist, you may want to handle that scenario
        // For example, redirect or return a message
    }

    // Return the view with the customer data
    return view('affiliate_dashboard.mywebsites_page', compact('customer'));
}


}
