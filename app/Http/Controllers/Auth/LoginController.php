<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($credentials['email'] === 'admin@example.com' && $credentials['password'] === 'password') {
            // Authenticate the user
            auth()->loginUsingId(1);

            return redirect('/');
        } else {
            // Invalid credentials
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function logout()
    {
        // logout the current user
        auth()->logout();

        // redirect to the login page
        return redirect('/login');
    }
}
