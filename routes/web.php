<?php

use App\Livewire\CreatePost;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialAuthController;

// Landing Page Logic
Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : view('welcome');
});

// User Search
// Route::get('/search', [ProfileController::class, 'search'])->name('search');

// // Public Profile (@username)
Route::get('/@{username}', [ProfileController::class, 'show'])->name('profile.public');

// Authentication & Dashboard
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    //livewire create post
     Route::get('/posts', CreatePost::class)->name('posts');
});

// Google OAuth
Route::prefix('auth/google')->group(function () {
    Route::get('/', [SocialAuthController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('/callback', [SocialAuthController::class, 'handleGoogleCallback']);
});
