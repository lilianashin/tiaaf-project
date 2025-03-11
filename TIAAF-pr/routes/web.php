<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiaafManager;
use Illuminate\Support\Facades\Auth;

// Default route: Show registration if the user is not authenticated
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard'); // Redirect to dashboard if logged in
    }
    return redirect()->route('registration'); // Redirect to registration if not logged in
});

// Dashboard route (requires authentication)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Login and Registration routes
Route::get('/login', [TiaafManager::class, 'login'])->name('login');
Route::post('/login', [TiaafManager::class, 'loginPost'])->name('login.post');
Route::get('/registration', [TiaafManager::class, 'registration'])->name('registration');
Route::post('/registration', [TiaafManager::class, 'registrationPost'])->name('registration.post');

// Logout Route (must be a POST request)
Route::post('/logout', function () {
    Auth::logout(); // Log out the user
    request()->session()->invalidate(); // Invalidate session
    request()->session()->regenerateToken(); // Regenerate CSRF token

    return redirect('/login')->with('success', 'You have been logged out'); // Redirect to login
})->name('logout');


Route::get('/dashboard', function () {
    if (!auth()->check()) {
        return redirect('/login'); // Redirect if not logged in
    }
    return view('dashboard');
})->middleware('auth')->name('dashboard');




