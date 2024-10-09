<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RaffleTicket;
use Illuminate\Support\Facades\Session;


class AffiliateTrackingController extends Controller
{
    public function index()
    {
        $customerId = Session::get('customer_id');
        
        // Fetch only the raffle tickets that belong to the logged-in user
        $raffletickets = RaffleTicket::where('user_id', $customerId)->get();
        return view('affiliate_dashboard.tracking_id',compact('raffletickets') );
    }

    public function store(Request $request)
    {
        $customerId = Session::get('customer_id');
        
        // Define custom messages
        $messages = [
            'tracking_id.required' => 'The tracking ID is required.',
            'tracking_id.string' => 'The tracking ID must be a string.',
            'tracking_id.max' => 'The tracking ID cannot be longer than 255 characters.',
            'tracking_id.unique' => 'This tracking ID is already in use.',
            'tracking_id.regex' => 'The tracking ID format is invalid. Only letters, numbers, underscores, hyphens, and ampersands are allowed.',
        ];

        // Validate the request with custom messages
        $request->validate([
            'tracking_id' => ['required', 'string', 'max:255', 'unique:raffle_tickets,token', 'regex:/^[A-Za-z0-9_\-&]+$/'],
        ], $messages);

        // Create and save the raffle ticket
        $raffleTicket = RaffleTicket::create([
            'user_id' => $customerId,
            'token' => $request->tracking_id,
            'status' => 'Pending', // Set a default status
        ]);

        return redirect()->route('tracking_id')->with('success', 'Tracking ID created successfully.');

    }
    


    public function setDefault($id)
    {
        $customerId = Session::get('customer_id');
        // Reset all raffle tickets to non-default
        RaffleTicket::where('user_id', auth()->id())->update(['default' => false]);

        // Set the selected ticket as default
        $ticket = RaffleTicket::findOrFail($id);
        $ticket->default = true;
        $ticket->save();

        return redirect()->back()->with('success', 'Default Tracking ID updated successfully.');
    }

    public function destroy($id)
    {
        $ticket = RaffleTicket::findOrFail($id);
        $ticket->delete();

        return redirect()->back()->with('success', 'Tracking ID deleted successfully.');
    }



}
