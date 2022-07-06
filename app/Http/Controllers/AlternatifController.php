<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Alternatif;
use App\Models\Subcriteria;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\StoreAlternatifRequest;
use App\Http\Requests\UpdateAlternatifRequest;
use App\Models\AlternatifDetail;
use phpDocumentor\Reflection\Types\Nullable;

class AlternatifController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $detail = AlternatifDetail::select(
      'alternatif_details.id as id',
      'alternatifs.id as alt',
      'criterias.id as cri',
      'subcriterias.id as sub',
      'alternatifs.nama_alternatif as alt_nama', 
      'criterias.nama_criteria as cri_nama',
      'subcriterias.nama_subcriteria as sub_nama')
      ->leftJoin('alternatifs', 'alternatifs.id', '=', 'alternatif_details.alternatif_id')
      ->leftJoin('criterias', 'criterias.id', '=', 'alternatif_details.criteria_id')
      ->leftJoin('subcriterias', 'subcriterias.id', '=', 'alternatif_details.subcriteria_id')
      
      ->get();

      $alternatifs = Alternatif::get();
      $criterias = Criteria::get();
     


    return view('alternatif.index',compact('detail', 'alternatifs', 'criterias'), [
      "aktif" => "alternatif",
      "judul" => "Data alternatif",
      "title" => "Alternatif",
    
      "subcriterias" => Subcriteria::all(),
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
    $subcriterias = Subcriteria::get();
  
    return view('alternatif.create', compact('criterias', 'subcriterias'), [
      "aktif" => "alternatif",
      "judul" => "Data Alternatif",
      "title" => "Tambah Alternatif",
      "alternatifs" => Alternatif::get(),
      // "subcriterias" => Subcriteria::get(),

    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreAlternatifRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreAlternatifRequest $request)
  {
   $request->validate([
    "nama_alternatif" => "required",
   
   ]);
  //  save alternatif
  $alt = New Alternatif;
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

    return redirect()->route('alternatif.index');
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
  public function edit(Alternatif $alternatif)
  {
    $criterias = Criteria::get();
    $subcriterias = Subcriteria::get();
    $alternatif_details = AlternatifDetail::where('alternatif_id', $alternatif->id)->get();
    return view('alternatif.edit', compact('alternatif', 'alternatif_details', 'criterias', 'subcriterias'),[
      "aktif" => "alternatif",
      "judul" => "Data alternatif",
      "title" => "Alternatif",

    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateAlternatifRequest  $request
   * @param  \App\Models\Alternatif  $alternatif
   * @return \Illuminate\Http\Response
   */
  public function update( UpdateAlternatifRequest $request,  $id )
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
    return redirect()->route('alternatif.index')->with('Alternatif updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Alternatif  $alternatif
   * @return \Illuminate\Http\Response
   */
  public function destroy(Alternatif $alternatif)
  {
    $detail = AlternatifDetail::where('alternatif_id', $alternatif->id)->delete();
    $alternatif->delete();
    

    return redirect()->route('alternatif.index')->withSuccess("Berhasil menghapus alternatif: $alternatif");
  }
}
