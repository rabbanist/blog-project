<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function registerForm(): View
    {
        return view('frontend.auth.register');
    }
}
