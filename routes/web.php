<?php
use Illuminate\Support\Facades\Route;

// Authentication Routes
Auth::routes();

// Authenticated Routes (protected by auth middleware)
Route::middleware('auth')->group(function () {
    // Home Page
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // User Profile
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');

    // Properties
    Route::get('/properties', [App\Http\Controllers\PropertyController::class, 'index'])->name('properties.index');
    Route::get('/properties/{property}', [App\Http\Controllers\PropertyController::class, 'show'])->name('properties.show');

    // Bookings
    Route::post('/bookings', [App\Http\Controllers\BookingController::class, 'store'])->name('bookings.store');

    // Messages
    Route::get('/messages', [App\Http\Controllers\MessageController::class, 'index'])->name('messages.index');
    Route::post('/messages', [App\Http\Controllers\MessageController::class, 'store'])->name('messages.store');

    // Logout
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});