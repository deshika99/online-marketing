<?php

namespace App\Http\Controllers;
use App\Models\Aff_Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class AffiliateCustomerController extends Controller
{
    public function showAffCustomers()
    {
        $aff_customer =  Aff_Customer::all();
        return view('admin_dashboard.aff_customers', compact('aff_customer'));
    }
    
    
    public function updateStatus(Request $request, $id)
    {
        $aff_customer = Aff_Customer::findOrFail($id);
        $aff_customer->status = $request->input('status');
        $aff_customer->save();
    
        return redirect()->back()->with('status', 'Customer status updated successfully.');
    }



    public function register(Request $request)
    {
        
        try {
            // Merge the day, month, and year for the date of birth
            $request->merge([
                'dob_day' => (int) $request->input('dob_day'),
                'dob_month' => (int) $request->input('dob_month'),
                'dob_year' => (int) $request->input('dob_year'),
            ]);

            // Validate the input data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'district' => 'required|string|max:255',
                'dob_day' => 'required|integer|between:1,31',
                'dob_month' => 'required|integer|between:1,12',
                'dob_year' => 'required|integer|digits:4',
                'gender' => 'required|in:male,female,other',
                'NIC' => 'required|string|max:20|unique:aff_customers,NIC',
                'phone_num' => 'required|string|max:20|regex:/^[0-9]{10}$/',
                'email' => 'required|email|max:255|unique:aff_customers,email',
                'password' => 'required|string|min:8|confirmed',
                'promotion_method' => 'nullable|array',
                'instagram_url' => 'nullable|url|max:255',
                'facebook_url' => 'nullable|url|max:255',
                'tiktok_url' => 'nullable|url|max:255',
                'youtube_url' => 'nullable|url|max:255',
                'content_website_url' => 'nullable|url|max:255',
                'content_whatsapp_url' => 'nullable|url|max:255',
                'bank_name' => 'nullable|string|max:255',
                'branch' => 'nullable|string|max:255',
                'account_name' => 'nullable|string|max:255',
                'account_number' => 'nullable|string|max:255',
            ]);
            //dd($request);
            // Create a date of birth string
            $dob = $validatedData['dob_year'] . '-' . str_pad($validatedData['dob_month'], 2, '0', STR_PAD_LEFT) . '-' . str_pad($validatedData['dob_day'], 2, '0', STR_PAD_LEFT);

            // Create the aff_customer record
            $aff_Customer = Aff_Customer::create([
                'name' => $validatedData['name'],
                'address' => $validatedData['address'],
                'district' => $validatedData['district'],
                'DOB' => $dob,
                'gender' => $validatedData['gender'],
                'NIC' => $validatedData['NIC'],
                'contactno' => $validatedData['phone_num'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'status' => 'pending',
                'promotion_method' => json_encode($validatedData['promotion_method']), // Store as JSON
                'instagram_url' => $validatedData['instagram_url'],
                'facebook_url' => $validatedData['facebook_url'],
                'tiktok_url' => $validatedData['tiktok_url'],
                'youtube_url' => $validatedData['youtube_url'],
                'content_website_url' => $validatedData['content_website_url'],
                'content_whatsapp_url' => $validatedData['content_whatsapp_url'],
                'bank_name' => $validatedData['bank_name'],
                'branch' => $validatedData['branch'],
                'account_name' => $validatedData['account_name'],
                'account_number' => $validatedData['account_number'],
            ]);

            return redirect()->route('register_form')->with('status', 'Successfully registered!');
        } catch (\Exception $e) {
            \Log::error('Error creating aff Customer:', [
                'message' => $e->getMessage(),
            ]);

            return redirect()->back()->withErrors(['error' => 'Failed to register. Please try again.']);
        }
    }

    


    
    public function login(Request $request)
    {
        $customer = Aff_Customer::where('email', $request->email)->first();
    
        if ($customer) {
            if ($customer->status === 'pending') {
                return redirect()->route('aff_home')->with('status1', 'pending');
            } elseif ($customer->status === 'rejected') {
                return redirect()->route('aff_home')->with('status1', 'rejected');
            } elseif ($customer->status === 'approved') {
                if (Hash::check($request->password, $customer->password)) {
                    Session::put('customer_id', $customer->id);
                    Session::put('customer_name', $customer->name);
                    
                    return redirect()->route('index', ['affiliate_id' => $customer->id]);
                } else {
                    return redirect()->route('aff_home')->withErrors(['password' => 'Invalid credentials.']);
                }
            }
        } else {
            return redirect()->route('aff_home')->withErrors(['email' => 'Email not found.']);
        }
    }
    
    
    

    public function index()
    {
        $affiliateId = Session::get('customer_id');
        $affiliateName = $affiliateId ? Aff_Customer::find($affiliateId)->name : 'Guest';
    
        return view('affiliate_dashboard.index', compact('affiliateName', 'affiliateId'));
    }
    

    public function logout(Request $request)
    {
        Session::forget('affiliate_customer_id');
        Session::forget('affiliate_customer_name');
        
        return redirect()->route('register_form');
    }
    


}
