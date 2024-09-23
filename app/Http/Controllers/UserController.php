<?php

namespace App\Http\Controllers;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function show_users()
    {
        $users = User::all();

        foreach ($users as $user) {
            if ($user->last_login) {
                $lastLogin = Carbon::parse($user->last_login);
                $user->status = $lastLogin->greaterThanOrEqualTo(Carbon::now()->subDays(30)) ? 'Active' : 'Inactive';
            } else {
                $user->status = 'Inactive';
            }
            if ($user->isDirty('status')) {
                $user->save();
            }
        }

        return view('admin_dashboard.users', compact('users'));
    }


    public function getUserDetails($id)
    {
        $user = User::findOrFail($id);
    
        if (!$user->status || $user->status === 'Inactive') {
            if ($user->last_login) {
                $lastLogin = Carbon::parse($user->last_login);
                $isActive = $lastLogin->greaterThanOrEqualTo(Carbon::now()->subDays(30));
    
                $user->status = $isActive ? 'Active' : 'Inactive';
            } else {
                $user->status = 'Inactive';
            }
        }
    
        return response()->json($user);
    }
    
    


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('show_users')->with('status', 'User deleted successfully.');
    }


    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'contact' => 'required|string|max:20',
            'role' => 'required|in:admin,customer',
            'userImage' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        $user = new User;
        $user->name = $request->input('Name');
        $user->email = $request->input('email');
        $user->phone_num = $request->input('contact');
        $user->role = $request->input('role');
        
        $user->status = $request->input('status') === 'on' ? 'Active' : 'Inactive';
    
        if ($request->hasFile('userImage')) {
            $file = $request->file('userImage');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/user_images', $fileName); 
            $user->profile_image = $fileName;
        } else {
            $user->profile_image = 'default-user.png'; 
        }
    
        $user->save();
    
        return redirect()->back()->with('status', 'User added successfully.');
    }


    
    public function editUserPage($id)
    {
        $user = User::findOrFail($id);
        return view('admin_dashboard.edit_users', compact('user'));
    }



    public function update(Request $request, $id)
    {
            $request->validate([
                'Name' => 'nullable|string|max:255',
                'email' => 'nullable|email|unique:users,email,' . $id,
                'contact' => 'nullable|string|max:20',
                'role' => 'nullable|in:admin,customer',
                'userImage' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'status' => 'nullable|boolean',
            ]);
    
            $user = User::findOrFail($id);
    
            Log::info('User found for update', ['user' => $user]);
    
            if ($request->filled('Name')) {
                $user->name = $request->input('Name');
            }
            if ($request->filled('email')) {
                $user->email = $request->input('email');
            }
            if ($request->filled('contact')) {
                $user->phone_num = $request->input('contact');
            }
            if ($request->filled('role')) {
                $user->role = $request->input('role');
            }
    
            $user->status = $request->input('status') == '1' ? 'Active' : 'Inactive';
    
            if ($request->hasFile('userImage')) {
                $file = $request->file('userImage');
                $fileName = $file->getClientOriginalName();
                $file->storeAs('public/user_images', $fileName);
                $user->profile_image = $fileName;
            }
    
            $user->save();
            return redirect()->route('show_users')->with('status', 'User updated successfully.');
            return redirect()->back()->with('error', 'Failed to update user.');
        }


}
    


