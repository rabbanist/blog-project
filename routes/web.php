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
});


// Authentication Routes 
Route::get('/register', [RegistrationController::class, 'registerForm'])->name('register');
Route::get('/login', [LoginController::class, 'showLoginFrom'])->name('login');


//Post Resources Routes
Route::resource('posts', PostController::class);


// Category Resources Routes
Route::resource('categories', CategoryController::class);
