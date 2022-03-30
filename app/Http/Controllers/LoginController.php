<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
       $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->only('email', 'password');
            return redirect()-> intended('/home');
        }
    }
    
    public function login(){
        return view('auth.login', [
            "title" => "Login"
           
        ]);
    }
}


