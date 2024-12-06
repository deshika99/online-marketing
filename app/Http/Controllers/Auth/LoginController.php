<?php 

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';  // This will redirect to the home page after login.

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Handle authentication logic and check credentials.
     */
    public function login(Request $request)
    {
        // Validate request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Get credentials
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember'); 

        // Attempt to authenticate the user
        if (Auth::attempt($credentials, $remember)) {
            // Update the last login timestamp
            $this->authenticated($request, Auth::user());

            // Redirect to the intended page or the default redirect path
            return redirect()->intended($this->redirectPath());
        }

        // If authentication fails, return with an error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    /**
     * Update the last login timestamp after authentication.
     */
    protected function authenticated(Request $request, $user)
    {
        $user->last_login = Carbon::now();
        $user->save();
    }

    /**
     * Log out the user and invalidate the session.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/home');  // Redirecting to home after logout
    }
}
