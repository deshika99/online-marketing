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

        return redirect()->back()->with('success', 'Customer status updated successfully.');
    }




    public function register(Request $request)
    {
        try {
            $dobYear = $request->input('dob_year');
            $dobMonth = $request->input('dob_month');
            $dobDay = $request->input('dob_day');

        
            if (!empty($dobYear) && !empty($dobMonth) && !empty($dobDay)) {
                $dob = "$dobYear-$dobMonth-$dobDay";
            } else {
                $dob = null;
            }

            $aff_Customer = Aff_Customer::create([
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'district' => $request->input('district'),
                'DOB' => $dob,  
                'gender' => $request->input('gender'),
                'NIC' => $request->input('NIC'),
                'contactno' => $request->input('phone_num'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'status' => 'pending',
            ]);

            return redirect()->route('register_form')->with('status', 'Successfully registered!');

        } catch (\Exception $e) {
            \Log::error('Error creating aff Customer:', [
                'message' => $e->getMessage(),
                'data' => $request->all(),
                'trace' => $e->getTraceAsString(),
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
                    
                    return redirect()->route('index');
                } else {
                    return redirect()->route('register_form')->withErrors(['password' => 'Invalid credentials.']);
                }
            }
        } else {
            return redirect()->route('register_form')->withErrors(['email' => 'Email not found.']);
        }
    }
    
    
    
    


}
