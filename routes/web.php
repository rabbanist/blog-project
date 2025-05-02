<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('frontend.home');
});


// Authentication Routes 
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegistrationController::class, 'registerForm'])->name('register');
    Route::post('/register', [RegistrationController::class, 'register'])->name('register.store');
    Route::get('/login', [LoginController::class, 'showLoginFrom'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.store');
});





Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
