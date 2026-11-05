<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            $isAdmin = $user->profile()
            ->where('type', 'admin')
            ->exists();

            if($isAdmin){
                return redirect()->intended(route('admin.users.index'));
            }
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'email'=> 'E-mail ou senha errados',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
