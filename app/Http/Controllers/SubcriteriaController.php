<?php

namespace App\Http\Controllers;

use App\Models\Subcriteria;
use App\Http\Requests\StoreSubcriteriaRequest;
use App\Http\Requests\UpdateSubcriteriaRequest;
use App\Models\Criteria;

class SubcriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcriteria = Subcriteria::all();
        return view('subcriteria.index',compact('subcriteria'),[
            "aktif" => "subcriteria",
            "judul" => "Data SubKriteria",
            "title" => "SubKriteria",
            "subcriterias" => Subcriteria::orderBy('nama', 'asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcriteria = Subcriteria::all();
        return view('subcriteria.index',compact('subcriteria'),[
            "aktif" => "subcriteria",
            "judul" => "Data SubKriteria",
            "title" => "SubKriteria",
            "subcriterias"=> Subcriteria::orderBy('nama', 'asc')->get()
             

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubcriteriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubcriteriaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcriteria  $subcriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Subcriteria $subcriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcriteria  $subcriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcriteria $subcriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubcriteriaRequest  $request
     * @param  \App\Models\Subcriteria  $subcriteria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubcriteriaRequest $request, Subcriteria $subcriteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcriteria  $subcriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcriteria $subcriteria)
    {
        //
    }
}
