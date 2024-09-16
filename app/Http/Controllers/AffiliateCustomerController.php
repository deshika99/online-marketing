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
        
            $request->merge([
                'dob_day' => (int) $request->input('dob_day'),
                'dob_month' => (int) $request->input('dob_month'),
                'dob_year' => (int) $request->input('dob_year'),
            ]);
    
       
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
            ]);
    
            
            $dob = $validatedData['dob_year'] . '-' . $validatedData['dob_month'] . '-' . $validatedData['dob_day'];
    
      
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
                return redirect()->route('register_form')->with('status1', 'pending');
            } elseif ($customer->status === 'rejected') {
                return redirect()->route('register_form')->with('status1', 'rejected');
            } elseif ($customer->status === 'approved') {
                if (Hash::check($request->password, $customer->password)) {
                    Session::put('customer_id', $customer->id);
                    Session::put('customer_name', $customer->name);
                    
                    return redirect()->route('index', ['affiliate_id' => $customer->id]);
                } else {
                    return redirect()->route('register_form')->withErrors(['password' => 'Invalid credentials.']);
                }
            }
        } else {
            return redirect()->route('register_form')->withErrors(['email' => 'Email not found.']);
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
