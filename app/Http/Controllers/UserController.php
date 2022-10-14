<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
            'password' => 'required|min:5|max:255',
            'roles' => 'required'
        ]);

        User::create($data);
        Toastr::success("Anda berhasil menambahkan $request->nama");
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required',
            'roles' => 'required'
            // 'password' => 'required|min:5|max:255'
        ]);
        $user->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'roles' => $request->roles,
            // 'password' => bcrypt($request->password),
        ]);
        Toastr::success("Anda berhasil mengubah $user->nama");
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.index')->withSuccess("Berhasil menghapus : $id");
    }
}
