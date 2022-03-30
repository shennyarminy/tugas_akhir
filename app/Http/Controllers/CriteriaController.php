<?php

namespace App\Http\Controllers;


use App\Models\Criteria;

use App\Models\Subcriteria;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatecriteriaRequest;
use Illuminate\Support\Facades\Auth;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $criteria = Criteria::all();
        return view('criteria.index',compact('criteria'),[
            "aktif" => "criteria",
            "judul" => "Data Kriteria",
            "title" => "Kriteria",
            "criterias"=> Criteria::orderBy('created_at', 'asc')->get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $criteria = new Criteria;
        return view('criteria.form', compact('criteria'), [
             "aktif" => "criteria",
             "judul" => "Data Kriteria",
             "title" => "Kriteria Tambah",
             "criterias"=> Criteria::orderBy('created_at', 'asc')->get()
           
            
             
           
         ]);
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecriteriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            "kode" => "required",
            "nama" => "required",
            "bobot" => "required",
            "tipe" => "required",
       ]);
        Criteria::create($request->all());
        return redirect()->route('criteria.index')->withSuccess("Berhasil menambahkan Kriteria: $request->nama");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function show(criteria $criteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $criteria =  Criteria::find($id);
        return view('criteria.edit', compact('criteria'), [
             "aktif" => "criteria",
             "judul" => "Ubah Kriteria",
             "title" => "Ubah Kriteria",
           
             
           
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecriteriaRequest  $request
     * @param  \App\Models\criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecriteriaRequest $request, criteria $criteria, $id)
    {
        $criteria =  Criteria::find($id);
        $data     = request()->validate([
            "kode" => "required",
            "nama" => "required",
            "bobot" => "required",
            "tipe" => "required",
        ]);

        $criteria->update([
            "kode" => $request->kode,
            "nama" => $request->nama,
            "bobot" => $request->bobot,
            "tipe" => $request->tipe,

        ]);
        return redirect()->route('criteria.index')->withSuccess("Berhasil mengubah kriteria: $request->nama");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(criteria $criteria, $id)
    {
        $criteria = Criteria::find($id);
        $criteria->delete();

        return redirect()->route('criteria.index')->withSuccess("Berhasil menghapus kriteria: $id");

    }
}