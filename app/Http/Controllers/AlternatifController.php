<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Alternatif;
use App\Models\Subcriteria;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\StoreAlternatifRequest;
use App\Http\Requests\UpdateAlternatifRequest;
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
    return view('alternatif.index', [
      "aktif" => "alternatif",
      "judul" => "Data alternatif",
      "title" => "Alternatif",
      "alternatifs" => Alternatif::all(),
      "criterias" => Criteria::all(),
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
    $alternatif = new Alternatif;
    return view('alternatif.create', compact('alternatif'), [
      "aktif" => "alternatif",
      "judul" => "Data Alternatif",
      "title" => "Tambah Alternatif",
      "criterias" => Criteria::get(),
      "subcriterias" => Subcriteria::get(),
      "alternatifs" => Alternatif::get(),

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
    $data = $request->validate(
      [
        "nama" => "required",
        "subcriteria_id" => "required",
      ],
      
    );

    $alternatif = Alternatif::create($request->only('nama'));
    $alternatif->subcriterias()->sync($request->subcriteria_id);

    foreach($alternatif->alternatif_details as $detail) {
      $detail->update([
        'criteria_id' => $detail->subcriteria->criteria_id
      ]);
    }

    Toastr::success("Anda berhasil menambahkan $request->nama");

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
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateAlternatifRequest  $request
   * @param  \App\Models\Alternatif  $alternatif
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateAlternatifRequest $request,  $id)
  {
    $alternatif = Alternatif::find($id);
    $data = $request->validate([
      "nama" => "required",
      "subcriteria_id" => "required",
    ]);


    $alternatif->update([
      $alternatif->update($request->only(['nama'])),
      $alternatif->subcriterias()->sync($request->subcriteria_id),
      
    
    ]);
    foreach($alternatif->alternatif_details as $detail) {
      $detail->update([
        'criteria_id' => $detail->subcriteria->criteria_id
      ]);
    }
    
    


    Toastr::success("Anda Berhasil mengubah $alternatif->nama");
    return redirect()->route('alternatif.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Alternatif  $alternatif
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $alternatif = Alternatif::find($id);
    $alternatif->delete();
    

    return redirect()->route('alternatif.index')->withSuccess("Berhasil menghapus alternatif: $id");
  }
}
