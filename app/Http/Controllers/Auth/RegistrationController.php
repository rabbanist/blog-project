<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use App\Http\Requests\Auth\RegistrationRequest;

class RegistrationController extends Controller
{
    public function registerForm(): View
    {
        return view('frontend.auth.register');
    }

    public function register(RegistrationRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        User::create($validated);

        Auth::attempt($request->only('email', 'password'));

        return redirect()->route('login')->with(ToastMagic::success('Registration successful', 'You can now login to your account'));
    }
}
