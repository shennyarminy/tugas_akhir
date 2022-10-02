<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\siswa;
use App\Models\Subcriteria;
use App\Models\perhitungan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use phpDocumentor\Reflection\Types\Nullable;
use App\Http\Requests\StoresiswaRequest;
use App\Http\Requests\UpdatesiswaRequest;

class siswaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()

  {
    $siswas = siswa::get();
    $criterias = Criteria::get();
    $perhitungans = perhitungan::get();

    return view('siswa.index', compact('siswas', 'criterias', 'perhitungans'), [
      "aktif" => "siswa",
      "judul" => "Data siswa",
      "title" => "siswa",

    ]);
  }

  public function penilaian()
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
    $siswa = new siswa;
    return view('siswa.create', compact('siswa'), [
      "aktif" => "siswa",
      "judul" => "Data siswa",
      "title" => "Tambah siswa",
      "criterias" => Criteria::get(),
      "subcriterias" => Subcriteria::get(),
      "siswas" => siswa::get(),

    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoresiswaRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoresiswaRequest $request)
  {
    $request->validate([
      "nama_siswa" => "required",
      "nis" => "required", 
      "nisn" => "required",
      "nama_ayah" => "required", 
      "nama_ibu" => "required", 
      "alamat" => "required",


    ], 
  [
    "nama_siswa.required" => "Nama Siswa tidak boleh kosong", 
    "nis.required" => "NIS tidak boleh kosong", 
    "nisn.required" => "NISN tidak boleh kosong", 
    "nama_ayah.required" => "Nama Ayah tidak boleh kosong", 
    "nama_ibu.required" => "Nama Ibu tidak boleh kosong", 
    "alamat.required" => "Alamat tidak boleh kosong", 
  ]);


    //  save siswa
    $alt = new siswa;
    $alt->nama_siswa = $request->nama_siswa;
    $alt->nis = $request->nis;
    $alt->nisn = $request->nisn;
    $alt->nama_ayah = $request->nama_ayah;
    $alt->nama_ibu = $request->nama_ibu;
    $alt->alamat = $request->alamat;
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

    return redirect()->route('siswa.index');
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
  public function edit(siswa $siswa)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdatesiswaRequest  $request
   * @param  \App\Models\siswa  $siswa
   * @return \Illuminate\Http\Response
   */
  public function update(UpdatesiswaRequest $request,  $id)
  {
    $siswa = siswa::find($id);
    $data = $request->validate([
      "nama_siswa" => "required",
      "nis" => "required", 
      "nisn" => "required",
      "nama_ayah" => "required", 
      "nama_ibu" => "required", 
      "alamat" => "required",
      "subcriteria_id" => "required",
    ]);


    $siswa->update([
      $siswa->update($request->only(['nama_siswa'])),
      $siswa->update($request->only(['nis'])),
      $siswa->update($request->only(['nisn'])),
      $siswa->update($request->only(['nama_ayah'])),
      $siswa->update($request->only(['nama_ibu'])),
      $siswa->update($request->only(['alamat'])),

      $siswa->subcriterias()->sync($request->subcriteria_id),
    ]);

    // UNTUK CRITERIA
    foreach ($siswa->perhitungans as $detail) {
      $detail->update([
        'criteria_id' => $detail->subcriteria->criteria_id
      ]);
    }

    Toastr::success("Anda Berhasil mengubah $siswa->nama_siswa");
    return redirect()->route('siswa.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\siswa  $siswa
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $siswa = siswa::find($id);
    $siswa->delete();
    return redirect()->route('siswa.index')->withSuccess("Berhasil menghapus siswa: $id");
  }
}
