<?php

namespace App\Http\Controllers;

use App\Http\Requests\confirmUserInputRequest;
use App\Http\Requests\updateUser;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }


    public function register()
    {
        return view('auth.register');
    }



    public function loginAuth()
    {
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($validated)) {
            request()->session()->regenerate();
        }
        return redirect()->route('home')->with('succes', 'loged-in');
    }
    
    public function logout() {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('home')->with('succes', 'loged-out');
        
    }
}
