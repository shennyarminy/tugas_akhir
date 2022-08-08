<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Alternatif;
use App\Models\Subcriteria;
use App\Models\AlternatifDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use phpDocumentor\Reflection\Types\Nullable;
use App\Http\Requests\StoreAlternatifRequest;
use App\Http\Requests\UpdateAlternatifRequest;

class AlternatifController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()

  {
    $alternatifs = Alternatif::get();
    $criterias = Criteria::get();
    $alternatif_details = AlternatifDetail::get();

    return view('alternatif.index', compact( 'alternatifs', 'criterias', 'alternatif_details'), [
      "aktif" => "alternatif",
      "judul" => "Data alternatif",
      "title" => "Alternatif",
     
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
      "nama_alternatif" => "required",
      "subcriteria_id" => "required",
    ]);


    $alternatif->update([
      $alternatif->update($request->only(['nama_alternatif'])),
      $alternatif->subcriterias()->sync($request->subcriteria_id),
    ]);

    // UNTUK CRITERIA
    foreach ($alternatif->alternatif_details as $detail) {
      $detail->update([
        'criteria_id' => $detail->subcriteria->criteria_id
      ]);
    }

    Toastr::success("Anda Berhasil mengubah $alternatif->nama_alternatif");
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
