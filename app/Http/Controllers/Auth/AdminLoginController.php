<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SystemUser; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin_dashboard.admin_login'); 
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        $hardcodedAdminEmail = 'admin@example.com';
        $hardcodedAdminPassword = 'password123'; 
    
        $admin = \App\Models\SystemUser::where('email', $request->email)
            ->where('role', 'admin') 
            ->first();
    
        if ($admin && password_verify($request->password, $admin->password)) {
            session([
                'is_admin' => true, 
                'name' => $admin->name, 
                'email' => $admin->email,
                'image_path' => 'storage/user_images/' . $admin->image_path, 
            ]);
            return redirect()->route('admin.index');
        }
    
        if ($request->email === $hardcodedAdminEmail && $request->password === $hardcodedAdminPassword) {
            session([
                'is_admin' => true, 
                'name' => 'Admin', 
                'email' => $hardcodedAdminEmail,
                'image_path' => null, 
            ]);
            return redirect()->route('admin.index'); 
        }
    
        return back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
    }
    




    public function logout(Request $request)
    {

        $request->session()->flush();
        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }


}
