<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function send_contact_mail(Request $request) {
        
        // $request->validate([
        //     'author' => 'required|string|max:255',
        //     'email' => 'required|email|max:255',
        //     'message' => 'required|string',
        // ]);
        // dd($request);

        // Send the email
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactFormMail($request));

        return back()->with('success', 'Thank you for contacting us!');
    }
}