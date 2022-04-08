<?php

namespace App\Http\Controllers;


use App\Models\Subcriteria;
use Brian2694\Toastr\Toastr;
use App\Http\Controllers\Controller;
use Doctrine\Inflector\Rules\Substitution;
use Symfony\Component\HttpFoundation\Request;
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
        // $subcriteria = Subcriteria::all();
        return view('subcriteria.index', [
            "aktif" => "subcriteria",
            "judul" => "Data Subkriteria",
            "title" => "Subkriteria",
            "subcriterias" => Subcriteria::all(),
            "criterias" => Criteria::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
           
            return view('subcriteria.create',  [
                "aktif" => "subcriteria", 
                "judul" => "Data Subkriteria",
                "title" => "tambah Subkriteria",
                "subcriterias" => Subcriteria::all(),
                "criterias" => Criteria::all(),

            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubcriteriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data = request()->validate([
           "criteria_id" => "required",
           "nama" => "required",
           "nilai" => "required",
       ]);
       Subcriteria::create($request->all());

       return redirect()->route('subcriteria.index')->withSuccess("Berhasil menambahkan murid: $request->nama");
       

       
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
