<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Alternatif;
use App\Models\Subcriteria;
use Illuminate\Http\Request;
use App\Models\AlternatifDetail;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
      $alternatif = Alternatif::get();
      $criterias = Criteria::get();
      $alternatif_details = AlternatifDetail::get();

  
      return view('value.index', compact( 'alternatif', 'criterias', 'alternatif_details'), [
        "aktif" => "penilaian",
        "judul" => "Data Penilaian",
        "title" => "Data Penilaian",
  
        "subcriteria" => Subcriteria::all(),
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $criterias = Criteria::get();
      $subcriteria = Subcriteria::get();
  
      return view('value.create', compact('criterias', 'subcriteria'), [
        "aktif" => "penilaian",
        "judul" => "Data Alternatif",
        "title" => "Tambah Alternatif",
        "alternatifs" => Alternatif::get(),
        // "subcriterias" => Subcriteria::get(),
  
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
      $request->validate([
        "nama_alternatif" => "required",
  
      ]);
      //  save alternatif
      $alt = new Alternatif;
      $alt->nama_alternatif = $request->nama_alternatif;
      $alt->save();
  
      // save detail
      $criterias = Criteria::get();
      foreach ($criterias as $criteria) {
        $detail = new AlternatifDetail();
        $detail->alternatif_id = $alt->id;
        $detail->criteria_id = $criteria->id;
        $detail->subcriteria_id = $request->input('criteria')[$criteria->id];
        $detail->save();
      }
  
      Toastr::success("Anda berhasil menambahkan $request->nama_alternatif");
  
      return redirect()->route('value.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function show(Alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function edit($alternatif_id)
    {
      $alternatif = Alternatif::find($alternatif_id);
      // untuk mencari id alternatif
      $criterias = Criteria::get();
      $subcriterias = Subcriteria::get();
      $alternatif_details = AlternatifDetail::where('alternatif_id', $alternatif_id)->get();
      return view('value.edit', compact('alternatif', 'alternatif_details', 'criterias', 'subcriterias'), [
        "aktif" => "penilaian",
        "judul" => "Data Penilaian",
        "title" => "Penilaian",
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, alternatif $alternatif, $id)
  {
    $alternatif = Alternatif::find($id);
    $detail = AlternatifDetail::where('alternatif_id', $alternatif->id)->get();
    $criteria = Criteria::get();


    $request->validate([
      "nama_alternatif" => "required",
    ]);
    $alternatif->update([
      $alternatif->update($request->only(['nama_alternatif'])),
    ]);

    foreach ($criteria as $key => $cri) {
      $detail[$key]->subcriteria_id = $request->input('criteria')[$cri->id];
      $detail[$key]->save();
    }

    Toastr::success("Anda Berhasil mengubah $alternatif->nama_alternatif");
    return redirect()->route('value.index')->with('Penilaian updated');
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function destroy($alternatif_id)
  {
    $alternatif = Alternatif::find($alternatif_id);
    $alternatif->delete();
    return redirect()->route('value.index')->withSuccess("Berhasil menghapus Penilaian: $alternatif");
  }
}
