<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// If you want Google login
use Laravel\Socialite\Facades\Socialite;

class AdminController extends Controller
{
  public function dashboard()
  {
    return view('admin.dashboard');
  }
}
