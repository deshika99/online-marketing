<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SystemUser;

class AdminProfileController extends Controller
{

    public function showProfile()
    {
        $admin = SystemUser::where('email', session('email'))->first(); 
        if (!$admin) {
            return redirect()->route('admin.login')->withErrors(['error' => 'Admin not found.']);
        }

        return view('admin_dashboard.admin_profile', compact('admin'));
    }
    


    public function updateProfile(Request $request)
    {

        $admin = SystemUser::where('email', session('email'))->first();
    
        if (!$admin) {
            return redirect()->route('admin.login')->withErrors(['error' => 'Admin not found.']);
        }
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:system_users,email,' . $admin->id,
            'contact' => 'required|string|max:15',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        try {
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->contact = $request->contact;
    
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('user_images', 'public');
                $admin->image_path = $imagePath; 
            }
    
            $admin->save(); 
            return redirect()->route('admin.profile')->with('status', 'Profile updated successfully.');
        } catch (\Exception $e) {
            \Log::error('Profile update failed: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Profile update failed.']);
        }
    }
    



    public function updatePassword(Request $request)
    {

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);
    
        $admin = SystemUser::where('email', session('email'))->first();
    
        if (!$admin) {
            return redirect()->route('admin.login')->withErrors(['error' => 'Admin not found.']);
        }
    
        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }
        try {
            $admin->password = Hash::make($request->new_password);
            $admin->save(); 
            return redirect()->route('admin.profile')->with('status', 'Password updated successfully.');
        } catch (\Exception $e) {
            \Log::error('Password update failed: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Password update failed.']);
        }
    }
    
}
