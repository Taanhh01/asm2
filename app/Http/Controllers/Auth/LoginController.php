<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate the login form
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to products/index
            return redirect()->intended('products');
        }

        // Authentication failed, redirect back with an error message
        return redirect()->back()->withErrors(['Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    protected $redirectTo = '/admin/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

