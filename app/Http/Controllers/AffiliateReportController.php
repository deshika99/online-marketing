<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RaffleTicket;

class AffiliateReportController extends Controller
{
    public function report($id)
    {
        // Find the raffle ticket by ID
        $raffleTicket = RaffleTicket::findOrFail($id);

        return view('affiliate_dashboard.order_tracking', compact('raffleTicket'));
    }

}
