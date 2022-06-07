<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Criteria;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'), [
            "aktif" => "user",
            "judul" => "Data User",
            "title" => "User",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;
        return view('user.create', compact('user'), [
             "aktif" => "user",
             "judul" => "Data User",
             "title" => "Data User",
         ]);
           
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|max:255', 
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email|unique:users', 
            'password' => 'required|min:5|max:255'
       ]);

       User::create($data);
       Toastr::success("Anda berhasil menambahkan $request->nama");
       return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'), [
            "aktif" => "user",
            "judul" => "Ubah User", 
            "title" => "Ubah User"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->validate([
            'nama' => 'required|max:255', 
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email|unique:users', 
            'password' => 'required|min:5|max:255'
       ]);
       $user->update([
        'nama' => 'required|max:255', 
        'username' => 'required|min:3|max:255|unique:users',
        'email' => 'required|email|unique:users', 
        'password' => 'required|min:5|max:255'
       ]);

       Toastr::success("Anda berhasil mengubah $user->nama");
       return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.index')->withSuccess("Berhasil menghapus : $id");
    }
}
