<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Session;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function index() {
        return view('dashboard.dashboard');
    }
    
    public function showLoginForm(){
        return view('auth.login');
    }

    public function validate_login(Request $request) 
    {
         #validation
         $validatedData = $request->validate([
            'email'              => 'required|email|regex:/(.*)@gmail\.com/i',
            'password'           => 'required|string|min:6',
        ]);

        $credentials = $request->only('email', 'password');

         // Check if the admin exists with the given email
         $admin = Admin::where('email', $credentials['email'])->first();

         if (!$admin || !Hash::check($credentials['password'], $admin->password)) {
             return back()->withErrors([
                 'email' => 'Username or Password does not match.',
             ])->onlyInput('email');
         }

        // Attempt to authenticate using the admin guard
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('success', 'You are logged in successfully.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

    // Handle admin logout
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('error','Logout successfully :)');
    }
}
