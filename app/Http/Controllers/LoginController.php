<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function index()
    {
        return Inertia::render('Login');
    }

    public function login(Request $request)
    {
    
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $validatedData = $request->validate($rules);


        if (Auth::attempt($validatedData)){
            $request->session()->regenerate();

            return redirect()->intended('/home');
        };

        return back()->withErrors('Email or password are incorrect');
    }

    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
