<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// If you want Google login
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Success
            return redirect()->intended('/dashboard')->with('success', 'Welcome back!');
        }

        // Failed
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logged out successfully');
    }

    // (Optional) Register page
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // (Optional) Google Login redirect
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // (Optional) Google Login callback
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate([
            'email' => $googleUser->getEmail(),
        ], [
            'name' => $googleUser->getName(),
            'password' => Hash::make('google_' . $googleUser->getId()),
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }
}
