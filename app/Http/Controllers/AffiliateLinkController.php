<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RaffleTicket;
use App\Models\AffiliateReferral;
use App\Models\AffiliateLink;
use App\Models\Products;
use Illuminate\Support\Facades\Session;


class AffiliateLinkController extends Controller
{
    public function showAffiliateForm() 
    {
        $customerId = Session::get('customer_id');
        
        // Get all tracking IDs for the logged-in user
        $trackingIds = RaffleTicket::where('user_id', $customerId)->get();
    
        // Check if there's already a default tracking ID
        $defaultTrackingId = $trackingIds->where('default', true)->first();
    
        // If no default tracking ID is set and the user has at least one tracking ID, set the first one as default
        if (!$defaultTrackingId && $trackingIds->count() == 1) {
            $defaultTrackingId = $trackingIds->first(); // Set the first ID as the default for this session (optional logic)
            $defaultTrackingId->default = true; // Mark it as default
            $defaultTrackingId->save(); // Save to the database
        }
    
        return view('affiliate_dashboard.tool', compact('trackingIds', 'defaultTrackingId'));
    }
    





    public function generateNewLink(Request $request)
    {
        // Validate the input
        $request->validate([
            'product_url' => 'required|url',
            'tracking_id' => 'required|string'
        ]);

        // Extract the product identifier (e.g., product_id or product_name) from the URL
        $productIdentifier = basename($request->product_url); // This extracts the last part of the URL (e.g., PRODUCT-XXXXX)

        //dd($productIdentifier);
        // Find the product by product_id or product_name
        $product = Products::where('product_id', $productIdentifier)->orWhere('product_name', $productIdentifier)->first();

        // If product exists, continue
        if ($product) {
            // Generate the affiliate tracking link
            //$trackingUrl = url('/track/' . $request->tracking_id) . '?redirect=' . urlencode($request->product_url);
            $trackingUrl = url('/track/' . $request->tracking_id . '/' . $product->product_id) . '?redirect=' . urlencode($request->product_url);


            // Find the raffle ticket by the tracking ID
            $raffleTicket = RaffleTicket::where('token', $request->tracking_id)->first();

            

            if ($raffleTicket) {
                // Save the generated link to the affiliate_links table
                AffiliateLink::create([
                    'user_id' => $raffleTicket->user_id,
                    'raffle_ticket_id' => $raffleTicket->id,
                    'link' => $trackingUrl,
                ]);

                // Save product details and other referral data in the AffiliateReferral table
                AffiliateReferral::create([
                    'user_id' => $raffleTicket->user_id,
                    'raffle_ticket_id' => $raffleTicket->id,
                    'product_url' => $request->product_url,
                    'views_count' => 0,
                    'referral_count' => 0,
                    'product_price' => $product->total_price, 
                    'affiliate_commission' => $this->calculateCommission($product->affiliate_price),
                ]);

                // Redirect back to the form with the generated link
                return redirect()->back()->with('generated_link', $trackingUrl);
            }
        }

        // If no product or raffle ticket is found, return an error
        return redirect()->back()->withErrors('Invalid tracking ID or product URL');
    }

    public function calculateCommission($affiliatePrice)
    {
        // Assuming the product has a commission percentage field, and it is stored as a decimal value (e.g., 0.10 for 10%)
        // Fetch the commission percentage from the product
        $product = Products::where('affiliate_price', $affiliatePrice)->first();

        // Ensure the product has a valid commission percentage
        if ($product && $product->commission_percentage > 0) {
            // Calculate the commission as a percentage of the affiliate price
            $commission = ($product->commission_percentage / 100) * $affiliatePrice;

            // Return the calculated commission
            return $commission;
        }

        // If no valid commission percentage is found, return 0
        return 0;
    }


    public function trackClick(Request $request, $tracking_id, $product_id)
{
    // Find the raffle ticket by the tracking ID
    $raffleTicket = RaffleTicket::where('token', $tracking_id)->first();

    if ($raffleTicket) {
        // Find the specific referral record by raffle_ticket_id and product_id
        $referral = AffiliateReferral::where('raffle_ticket_id', $raffleTicket->id)
                                     ->where('product_url', 'like', '%' . $product_id . '%')
                                     ->first();

        if ($referral) {
            // Increment the views count for the specific product referral
            $referral->increment('views_count');

            // Store tracking_id in the session for later use during the checkout process
            session(['tracking_id' => $tracking_id]);

            // Check if a redirect URL is provided
            if ($request->has('redirect')) {
                return redirect($request->input('redirect'));
            }

            // Default redirect if no redirect URL is provided
            return redirect('/');
        }
    }

    // If not found, redirect to home or show an error
    return redirect('/')->withErrors('Invalid tracking link.');
}

    


    public function trackReferral($tracking_id, $product_price)
    {
        // Find the raffle ticket by the tracking ID
        $raffleTicket = RaffleTicket::where('token', $tracking_id)->first();

        if ($raffleTicket) {
            // Find the associated referral record
            $referral = AffiliateReferral::where('raffle_ticket_id', $raffleTicket->id)->first();

            if ($referral) {
                // Increment the referral count
                $referral->increment('referral_count');

                // Calculate affiliate commission (e.g., 10%)
                $commissionRate = 0.10; // Example 10% commission rate
                $commissionEarned = $product_price * $commissionRate;

                // Update the referral record
                $referral->update([
                    'product_price' => $product_price,
                    'affiliate_commission' => $commissionEarned,
                    'completed_at' => now(),
                ]);
            }
        }
    }

    public function adCenter() 
    {
        $customerId = Session::get('customer_id');

        $affliatelinks = AffiliateLink::with(['raffleTicket.product.images']) // Load product and its images
        ->where('user_id', $customerId)
        ->get();

        return view('affiliate_dashboard.code_center', compact('affliatelinks'));
    }


    public function codeCenter()
{
    // Get the customer ID from session
    $customerId = Session::get('customer_id');

    // Find all affiliate links for the customer
    $affiliateLinks = AffiliateLink::where('user_id', $customerId)->get();

    // Prepare an array to hold product details and affiliate links
    $data = [];

    // Loop through each affiliate link
    foreach ($affiliateLinks as $link) {
        // Find the related AffiliateReferral to get the product URL
        $affiliateReferral = AffiliateReferral::where('raffle_ticket_id', $link->raffle_ticket_id)->first();

        if ($affiliateReferral) {
            // Extract the product identifier from the product URL
            $productIdentifier = basename($affiliateReferral->product_url);

            // Find the product by product_id or product_name
            $product = Products::where('product_id', $productIdentifier)
                                ->orWhere('product_name', $productIdentifier)
                                ->first();

            if ($product) {
                // Store product details and affiliate link data
                $data[] = [
                    'product_name' => $product->product_name,
                    'product_image' => $product->images->first() ? $product->images->first()->image_path : null,
                    'tracking_id' => $link->raffleTicket->token,
                    'affiliate_link' => $link->link,
                ];
            }
        }
    }

    // Pass data to the view
    return view('affiliate_dashboard.code_center', compact('data'));
}











}
