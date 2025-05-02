<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('frontend.home');
});

// Dashboard Routes
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth')->name('dashboard');


// Authentication Routes 

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegistrationController::class, 'registerForm'])->name('register');
    Route::post('/register', [RegistrationController::class, 'register'])->name('register.store');
    Route::get('/login', [LoginController::class, 'showLoginFrom'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.store');
});


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


//Post Resources Routes
Route::resource('posts', PostController::class);


// Category Resources Routes
Route::resource('categories', CategoryController::class);
