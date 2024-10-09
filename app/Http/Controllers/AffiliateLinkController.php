<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RaffleTicket;
use App\Models\AffiliateReferral;
use App\Models\AffiliateLink;


class AffiliateLinkController extends Controller
{
    public function showAffiliateForm() {
        
        $user = auth()->user();
        $trackingIds = RaffleTicket::where('user_id', auth()->id())->get();
        $defaultTrackingId = $trackingIds->where('default', true)->first(); 
    
        return view('affiliate_dashboard.tool', compact('trackingIds', 'defaultTrackingId'));
    }





    public function generateNewLink(Request $request)
    {
        // Validate the input
        $request->validate([
            'product_url' => 'required|url',
            'tracking_id' => 'required|string'
        ]);

        // Generate the affiliate tracking link
        $trackingUrl = url('/track/' . $request->tracking_id) . '?redirect=' . urlencode($request->product_url);

        // Find the raffle ticket by the tracking ID
        $raffleTicket = RaffleTicket::where('token', $request->tracking_id)->first();

        if ($raffleTicket) {
            // Save the generated link to the affiliate_links table
            AffiliateLink::create([
                'user_id' => $raffleTicket->user_id,
                'raffle_ticket_id' => $raffleTicket->id,
                'link' => $trackingUrl, // Use the generated tracking URL
            ]);

            // Also save the initial referral entry in the affiliate_referrals table
            AffiliateReferral::create([
                'user_id' => $raffleTicket->user_id,
                'raffle_ticket_id' => $raffleTicket->id,
                'product_url' => $request->product_url,
                'views_count' => 0,
                'referral_count' => 0,
                'product_price' => 0,
                'affiliate_commission' => 0,
            ]);

            // Redirect back to the form with the generated link
            return redirect()->back()->with('generated_link', $trackingUrl);
        }

        // If the tracking ID is not found, return an error message
        return redirect()->back()->withErrors('Invalid tracking ID');
    }


    public function trackClick(Request $request, $tracking_id)
    {
        // Find the raffle ticket by the tracking ID
        $raffleTicket = RaffleTicket::where('token', $tracking_id)->first();
    
        if ($raffleTicket) {
            // Find the associated referral record
            $referral = AffiliateReferral::where('raffle_ticket_id', $raffleTicket->id)->first();
    
            if ($referral) {
                // Increment the views count
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




}
