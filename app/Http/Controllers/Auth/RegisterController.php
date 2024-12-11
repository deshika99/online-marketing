<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

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
     * Show the signup form.
     *
     * @return \Illuminate\View\View
     */
    public function showSignupForm()
    {
        return view('signup');
    }

    /**
     * Validate the registration data.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
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
            'DOB_day.min' => 'The day must be between 1 and 31.',
            'DOB_day.max' => 'The day must be between 1 and 31.',
            'DOB_month.min' => 'The month must be between 1 and 12.',
            'DOB_month.max' => 'The month must be between 1 and 12.',
            'DOB_year.min' => 'The year must be greater than 1900.',
            'DOB_year.max' => 'The year must not exceed the current year.',
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validate and sanitize the request data
        $validatedData = $request->merge([
            'DOB_day' => (int) $request->input('DOB_day'),
            'DOB_month' => (int) $request->input('DOB_month'),
            'DOB_year' => (int) $request->input('DOB_year'),
        ])->all();

        $this->validator($validatedData)->validate();

        // Create the user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'address' => $request->input('address'),
            'district' => $request->input('district'),
            'date_of_birth' => $request->input('DOB_year') . '-' . $request->input('DOB_month') . '-' . $request->input('DOB_day'),
            'phone_num' => $request->input('phone_num'),
            'acc_no' => $request->input('acc_no'),
            'bank_name' => $request->input('bank_name'),
            'branch' => $request->input('branch'),
            'role' => 'customer', // Default role
        ]);

        if (!$user) {
            return redirect()->back()->with('error', 'User registration failed. Please try again.');
        }

        // Log the user in automatically
        Auth::login($user);

        // Redirect to the login page with a success message
        return redirect()->route('login')->with('status', 'Successfully registered! Please log in to continue.');
    }
}
