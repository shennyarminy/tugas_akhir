<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\siswa;
use App\Models\Subcriteria;
use Illuminate\Http\Request;
use App\Models\perhitungan;
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

    $siswa = siswa::get();
    $criterias = Criteria::get();
    $perhitungans = perhitungan::get();


    return view('value.index', compact('siswa', 'criterias', 'perhitungans'), [
      "aktif" => "value",
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
      "judul" => "Data siswa",
      "title" => "Tambah siswa",
      "siswas" => siswa::get(),
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
      "nama_siswa" => "required",

    ]);
    //  save siswa
    $alt = new siswa;
    $alt->nama_siswa = $request->nama_siswa;
    $alt->save();

    // save detail
    $criterias = Criteria::get();
    foreach ($criterias as $criteria) {
      $detail = new perhitungan();
      $detail->siswa_id = $alt->id;
      $detail->criteria_id = $criteria->id;
      $detail->subcriteria_id = $request->input('criteria')[$criteria->id];
      $detail->save();
    }

    Toastr::success("Anda berhasil menambahkan $request->nama_siswa");

    return redirect()->route('value.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\siswa  $siswa
   * @return \Illuminate\Http\Response
   */
  public function show(siswa $siswa)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\siswa  $siswa
   * @return \Illuminate\Http\Response
   */
  public function edit($siswa_id)
  {
    $siswa = siswa::find($siswa_id);
    // untuk mencari id siswa
    $criterias = Criteria::get();
    $subcriterias = Subcriteria::get();
    $perhitungans = perhitungan::where('siswa_id', $siswa_id)->get();
    return view('value.edit', compact('siswa', 'perhitungans', 'criterias', 'subcriterias'), [
      "aktif" => "penilaian",
      "judul" => "Data Penilaian",
      "title" => "Penilaian",
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\siswa  $siswa
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, siswa $siswa, $id)
  {
    $siswa = siswa::find($id);
    $detail = perhitungan::where('siswa_id', $siswa->id)->get();
    $criteria = Criteria::get();


    $request->validate([
      "nama_siswa" => "required",
    ]);
    $siswa->update([
      $siswa->update($request->only(['nama_siswa'])),
    ]);

    foreach ($criteria as $key => $cri) {
      $detail[$key]->subcriteria_id = $request->input('criteria')[$cri->id];
      $detail[$key]->save();
    }

    Toastr::success("Anda Berhasil mengubah $siswa->nama_siswa");
    return redirect()->route('value.index')->with('Penilaian updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\siswa  $siswa
   * @return \Illuminate\Http\Response
   */
  public function destroy($siswa_id)
  {
    $siswa = siswa::find($siswa_id);
    $siswa->delete();
    return redirect()->route('value.index')->withSuccess("Berhasil menghapus Penilaian: $siswa");
  }
}
