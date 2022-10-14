<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login', [
            "title" => "Login"
           
        ]);
    }
    public function authenticate(Request $request)
    {
       $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()-> intended('/home');
        }
        Toastr::error("Anda gagal melakukan login!");
        return back();
            
        
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function register(){
        return view('auth.register2', [
            "title" => "Register", 
            "aktif" => "register",
        ]);
    }

    public function store(Request $request)
    {
         $validateData = $request->validate([
             'nama' => 'required|max:255', 
             'username' => 'required|min:3|max:255|unique:users',
             'email' => 'required|email|unique:users', 
             'password' => 'required|min:5|max:255',
             'roles' => 'required'
        ]);

       $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);

        Toastr::success("Anda berhasil menambahkan $request->nama");

        return redirect('/');

        
    }
    
    
}
