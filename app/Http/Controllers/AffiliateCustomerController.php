<?php

namespace App\Http\Controllers;
use App\Models\Aff_Customer;
use App\Models\Affiliate_Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class AffiliateCustomerController extends Controller
{
    public function showAffCustomers()
    {
        $aff_customer =  Affiliate_Customer::all();
        return view('admin_dashboard.aff_customers', compact('aff_customer'));
    }
    
    
    public function updateStatus(Request $request, $id)
    {
        $aff_customer = Affiliate_Customer::findOrFail($id);
        $aff_customer->status = $request->input('status');
        $aff_customer->save();
    
        return redirect()->back()->with('status', 'Customer status updated successfully.');
    }



    public function register(Request $request)
    {
        //dd($request);
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'dob_day' => 'required|integer|min:1|max:31',
            'dob_month' => 'required|integer|min:1|max:12',
            'dob_year' => 'required|integer',
            'gender' => 'nullable|string|max:255',
            'NIC' => 'required|string|max:255',
            'phone_num' => 'required|string|max:20',

            'email' => 'required|email|unique:affiliate_customers,email|max:255',

            'password' => 'required|string|min:8|confirmed',
            'promotion_method' => 'nullable|array',
            'instagram_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'tiktok_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'content_website_url' => 'nullable|url',
            'content_whatsapp_url' => 'nullable|url',
            'bank_name' => 'nullable|string|max:255',
            'branch' => 'nullable|string|max:255',
            'account_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
        ]);
        //dd($request);
        // Combine the Date of Birth fields into a single date
        $dob = $validatedData['dob_year'] . '-' . str_pad($validatedData['dob_month'], 2, '0', STR_PAD_LEFT) . '-' . str_pad($validatedData['dob_day'], 2, '0', STR_PAD_LEFT);

        // Save the data in the aff_customers table
        $customer = new Affiliate_Customer;
        $customer->name = $validatedData['name'];
        $customer->address = $validatedData['address'];
        $customer->district = $validatedData['district'];
        $customer->DOB = $dob;
        $customer->gender = $validatedData['gender'];
        $customer->NIC = $validatedData['NIC'];
        $customer->contactno = $validatedData['phone_num'];
        $customer->email = $validatedData['email'];
        $customer->password = Hash::make($validatedData['password']); // Hash the password before storing
        $customer->promotion_method = json_encode($validatedData['promotion_method']); // Store as JSON
        $customer->instagram_url = $validatedData['instagram_url'];
        $customer->facebook_url = $validatedData['facebook_url'];
        $customer->tiktok_url = $validatedData['tiktok_url'];
        $customer->youtube_url = $validatedData['youtube_url'];
        $customer->content_website_url = $validatedData['content_website_url'];
        $customer->content_whatsapp_url = $validatedData['content_whatsapp_url'];
        $customer->bank_name = $validatedData['bank_name'];
        $customer->branch = $validatedData['branch'];
        $customer->account_name = $validatedData['account_name'];
        $customer->account_number = $validatedData['account_number'];
        $customer->status = 'pending';

        // Save the customer to the database
        $customer->save();

        // Redirect to a success page with a session message
        
        return redirect()->route('aff_home')->with('status', 'Affiliate account created successfully!');
    }

    


    
    public function login(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to find the customer by email
        $customer = Affiliate_Customer::where('email', $request->email)->first();

        if ($customer) {
            // Check the customer's status
            if ($customer->status === 'pending') {
                return redirect()->route('aff_home')->with('status', 'pending');
            } elseif ($customer->status === 'rejected') {
                return redirect()->route('aff_home')->with('status', 'rejected');
            } elseif ($customer->status === 'approved') {
                // Use Hash::check() to compare the plain password with the hashed password
                if (Hash::check($request->password, $customer->password)) {
                    // Store customer information in the session
                    Session::put('customer_id', $customer->id);
                    Session::put('customer_name', $customer->name);
                    
                    return redirect()->route('index', ['affiliate_id' => $customer->id]);
                } else {
                    // Password mismatch, return an error
                    return redirect()->route('aff_home')->withErrors(['password' => 'Invalid credentials.']);
                }
            }
        } else {
            // Customer not found, return an error
            return redirect()->route('aff_home')->withErrors(['email' => 'Email not found.']);
        }
    }


    
    
    

    public function index()
    {
        $affiliateId = Session::get('customer_id');
        $affiliateName = $affiliateId ? Affiliate_Customer::find($affiliateId)->name : 'Guest';
    
        return view('affiliate_dashboard.index', compact('affiliateName', 'affiliateId'));
    }
    

    public function logout(Request $request)
    {
        Session::forget('affiliate_customer_id');
        Session::forget('affiliate_customer_name');
        
        return redirect()->route('register_form');
    }
    


}
