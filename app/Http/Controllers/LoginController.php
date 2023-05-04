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
        dd($request);
    
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $validatedData = $request->validate($rules);


        if (Auth::attempt()){
            $request->session()->regenerate();

            return redirect()->intended('/home');
        };

        return back()->withErrors('Email or password are incorrect');
    }
}
