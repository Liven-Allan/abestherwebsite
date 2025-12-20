<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Debug: Log the login attempt
        \Log::info('Login attempt', [
            'username' => $request->username,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user) {
            \Log::warning('User not found', ['username' => $request->username]);
            return back()->withErrors([
                'username' => 'User not found.',
            ])->withInput();
        }

        if (!Hash::check($request->password, $user->password)) {
            \Log::warning('Password mismatch', ['username' => $request->username]);
            return back()->withErrors([
                'username' => 'Invalid password.',
            ])->withInput();
        }

        Auth::login($user);
        \Log::info('Login successful', ['user_id' => $user->id, 'username' => $user->username]);
        
        return redirect()->route('admin')->with('success', 'Login successful!');
    }

    public function admin()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to access admin area.');
        }
        
        return view('admin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logged out successfully!');
    }
}
