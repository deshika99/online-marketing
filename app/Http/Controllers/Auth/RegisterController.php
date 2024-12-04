<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request; 

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['nullable', 'string', 'max:255'],
            'district' => ['nullable', 'string', 'max:255'],
            'DOB_day' => ['nullable', 'integer', 'min:1', 'max:31'],
            'DOB_month' => ['nullable', 'integer', 'min:1', 'max:12'],
            'DOB_year' => ['nullable', 'integer', 'min:1900', 'max:' . date('Y')],
            'phone_num' => ['nullable', 'string', 'max:15'],
            'acc_no' => ['nullable', 'string', 'max:20'],
            'bank_name' => ['nullable', 'string', 'max:255'],
            'branch' => ['nullable', 'string', 'max:255'],
        ], [
            'DOB_month.min' => 'The month must be between 1 and 12.',
            'DOB_month.max' => 'The month must be between 1 and 12.',
        ]);
    }

    


    public function register(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ], [
        'email.unique' => 'This email is already registered.',
        'password.confirmed' => 'Passwords do not match.',
    ]);

    // Create the user in the database
    User::create([
        'fname' => $validatedData['fname'],
        'lname' => $validatedData['lname'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'role' => 'customer', // Optional if your User model uses a default value
    ]);

    // Redirect with a success message
    return redirect('login')->with('status', 'Successfully registered!');
}


      
    

}
    
    
       
    




