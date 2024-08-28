<?php

namespace App\Http\Controllers;
use App\Models\Aff_Customer;
use Illuminate\Http\Request;

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

}
