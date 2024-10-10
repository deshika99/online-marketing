<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        // chek User log
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Please register and log in to submit an inquiry.');
        }

        // Validate the form data
        $request->validate([
            'order_id' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        //  save Inquiry 
        Inquiry::create([
            'user_id' => Auth::id(), // Current Logged in User ID
            'order_id' => $request->order_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Your inquiry has been submitted successfully.');
    }
    public function showCustomerInquiries() {
       $inquiries = Inquiry::all(); 
       
       return view('admin_dashboard.customer_inquiries', compact('inquiries'));
    }
    

}
