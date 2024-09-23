<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserDashboardController extends Controller
{
    public function myOrders()
    {
        $orders = CustomerOrder::with(['items.product'])
            ->where('user_id', auth()->id())
            ->get();
    
        $inProgressOrders = $orders->where('status', 'Inprogress');
        $deliveredOrders = $orders->where('status', 'Delivered');
        $cancelledOrders = $orders->where('status', 'Cancelled');
    
        return view('member_dashboard.myorders', compact('orders', 'inProgressOrders', 'deliveredOrders', 'cancelledOrders'));
    }

    public function editProfile()
    {
        // Display the current user's profile
        return view('member_dashboard.edit-profile');
    }

    public function updateProfile(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'phone_num' => 'nullable|string|max:15',
            'date_of_birth' => 'nullable|date',
            'status' => 'nullable|string|in:male,female,other',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();

        // Handle file upload for profile image
        if ($request->hasFile('profile_image')) {
            if ($user->profile_image) {
                Storage::delete($user->profile_image);
            }

            $profilePicturePath = $request->file('profile_image')->store('profile_image');
            $user->profile_image = $profilePicturePath;
        }

        // Update the user's profile with the provided input
        $user->name = $request->input('full_name');
        $user->email = $request->input('email');
        $user->phone_num = $request->input('phone_num');
        $user->date_of_birth = $request->input('birthday');
        $user->status = $request->input('status');

        // Save updated user information
        $user->save();

        return redirect()->back()->with('status', 'Profile updated successfully!');
    }



    public function orderDetails($order_code)
    {
        $order = CustomerOrder::with(['items.product'])->where('order_code', $order_code)->first();
        if (!$order) {
            return redirect()->route('myorders')->with('error', 'Order not found');
        }
        return view('member_dashboard.order-details', compact('order'));
    }
    

}
