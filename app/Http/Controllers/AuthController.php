<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->isAdmin()) {
                return redirect()->route('dashboard');
            } elseif ($user->isTeacher()) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('dashboard');
            }
        } else {
            return redirect()->back()->withErrors([
                'email' => 'Invalid email or password',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
