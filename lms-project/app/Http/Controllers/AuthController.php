<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
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
        $request->session()->regenerate();

        $user = Auth::user();

        // ✅ If admin, redirect to admin dashboard
        if ($user->role === 'Admin') {
            return redirect()->route('admin.dashboard')->with('success', 'Welcome Admin!');
        }

        // Optional: other roles
        if ($user->role === 'teacher') {
            return redirect()->route('about')->with('success', 'Welcome Teacher!');
        }

        if ($user->role === 'student') {
            return redirect()->route('about')->with('success', 'Welcome Student!');
        }

        // fallback
        return redirect()->intended('/dashboard');
    }

    return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
}


    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/about')->with('success', 'Logged out successfully');
    }

    // Show register form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Handle register
    public function register(Request $request)
{
    // ✅ Custom error messages
    $messages = [
        'password.min' => 'The password must be at least 8 characters.',
        'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
        'password.confirmed' => 'The password confirmation does not match.',
        'role.in' => 'The role must be either teacher or student.',
        'status.in' => 'The status must be Pending, Approve, or Reject.',
    ];

    // ✅ Validation rules
    $request->validate([
        'name' => 'required|string|max:255',
        'role' => 'required|in:teacher,student',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => [
            'required',
            'string',
            'confirmed',
            'min:8',
            'regex:/[A-Z]/',     // Uppercase
            'regex:/[a-z]/',     // Lowercase
            'regex:/[0-9]/',     // Number
            'regex:/[@$!%*?&]/', // Special char
        ],
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        'department' => 'nullable|string|max:255',
        'designation' => 'nullable|string|max:255',
        'roll_no' => 'nullable|string|max:100',
        'year' => 'nullable|string|max:50',
        'major' => 'nullable|string|max:100',
        'status' => 'nullable|string|in:Pending,Approve,Reject',
    ], $messages); // 👈 attach messages here

    // ✅ Save new user
    User::create([
        'name' => $request->name,
        'role' => $request->role,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'phone' => $request->phone,
        'address' => $request->address,
        'department' => $request->department,
        'designation' => $request->designation,
        'roll_no' => $request->roll_no,
        'year' => $request->year,
        'major' => $request->major,
        'status' => $request->status ?? 'Pending',
    ]);

    return redirect()->route('login')->with('success', 'Account created successfully!');
}


    // Optional: Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'password' => Hash::make('google_' . $googleUser->getId()),
            ]
        );

        Auth::login($user);
        return redirect('/index');
    }
    public function showResetPassword()
    {
        return view('auth.forgotpassword');
    }
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    // Show reset password form
    public function showResetForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    // Handle new password submission
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = bcrypt($password);
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
