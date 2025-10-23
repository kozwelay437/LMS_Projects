<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\teacher\AssignmentController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/assignments/document/{filename}', function ($filename) {
    $path = storage_path('app/public/' . $filename);
    return response()->file(file: $path);
});

Route::prefix('teacher')->name('teacher.')->group(function () {
    Route::resource('assignments', AssignmentController::class);
});


// Show login page
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Handle login form submit
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// (Optional) Register Page
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
// Optional: Google Login
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
Route::get('/showResetPassword', [AuthController::class, 'showResetPassword'])->name('resetPassword');
Route::post('forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
// Reset password form
Route::get('reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
// Reset password submission
Route::post('reset-password', [AuthController::class, 'reset'])->name('password.update');


Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');



Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/index', [PageController::class, 'home'])->name('index');
Route::get('/assignCalendar', [PageController::class, 'assignCalendar'])->name('assignCalendar');
Route::get('/assignment', [PageController::class, 'assignment'])->name('assignment');



Route::middleware(['login.required'])->group(function () {
    Route::get('/studentAssignment', [PageController::class, 'studentAssignment'])->name('studentAssignment');
    Route::get('/event', [PageController::class, 'events'])->name('event');
});

Route::get('/department/it', [PageController::class, 'it']);
Route::get('/department/ep', [PageController::class, 'ep']);
Route::get('/department/ec', [PageController::class, 'ec']);
Route::get('/department/ie', [PageController::class, 'ie']);
Route::get('/department/me', [PageController::class, 'me']);
Route::get('/department/civil', [PageController::class, 'civil']);