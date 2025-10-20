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
Route::get('/index', [PageController::class, 'home'])->name('index');
Route::get('/assignCalendar', [PageController::class, 'assignCalendar'])->name('assignCalendar');
Route::get('/assignment', [PageController::class, 'assignment'])->name('assignment');
Route::get('/studentAssignment', [PageController::class, 'studentAssignment'])->name('studentAssignment');
Route::get('/event', [PageController::class, 'events'])->name('event');
Route::get('/department/it', [PageController::class, 'it']);
Route::get('/department/ep', [PageController::class, 'ep']);
Route::get('/department/ec', [PageController::class, 'ec']);
Route::get('/department/ie', [PageController::class, 'ie']);
Route::get('/department/me', [PageController::class, 'me']);
Route::get('/department/civil', [PageController::class, 'civil']);