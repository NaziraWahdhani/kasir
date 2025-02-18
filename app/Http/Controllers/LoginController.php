<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function attempt(Request $request)
    {
        try {
            $user = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);


            if (!Auth::attempt($user)) {
                return redirect()->route('login')->with('error_message', 'Email atau password salah');
            }

            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Login Berhasil');

        } catch (Exception $e) {
            return redirect()->route('login')->with('error_message', $e->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
