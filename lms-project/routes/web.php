<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});



// Show login page
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Handle login form submit
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// (Optional) Register Page
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

// Optional: Google Login
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);


Route::get('/about', [PageController::class, 'about'])->name('about');

