<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;

class RegisterController extends Controller
{
    
        public function index(){
            return view('register.index', [
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
                 'password' => 'required|min:5|max:255'
            ]);

           $validateData['password'] = Hash::make($validateData['password']);
            User::create($validateData);

            Toastr::success("Anda berhasil menambahkan $request->nama");

            return redirect('/login');

            
        }
}

