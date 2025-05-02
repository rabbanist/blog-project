<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class LoginController extends Controller
{
    public function showLoginFrom(): View
    {
        return view('frontend.auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    { {
            $validated = $request->validated();

            if (Auth::attempt($validated)) {
                return redirect()->route('dashboard')->with(ToastMagic::success('Login successful', 'Welcome back!'));
            }
        }
        return redirect()->back()->with(ToastMagic::error('Login failed', 'Invalid credentials'));
    }


    /*/
     * Logout the user and redirect to the login page.
    *
     * @return RedirectResponse
    */

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login')->with(ToastMagic::success('Logout successful', 'You have been logged out'));
    }
}
