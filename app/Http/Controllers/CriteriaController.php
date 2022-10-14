<?php

namespace App\Http\Controllers;


use App\Models\Criteria;

use App\Models\Subcriteria;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdatecriteriaRequest;

class CriteriaController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()

	{
		$criterias = Criteria::all();
		// $criterias = DB::table('criterias')->sum('bobot_criteria');
		$nilai = Criteria::sum('bobot_criteria');
		
		if (auth()->user()->roles == "DM") {
		return view('criteria.index',compact('criterias', 'nilai'),[
			"aktif" => "criteria",
			"judul" => "Penilaian Bobot",
			"title" => "Penilaian Bobot",
		]);
	}

	else{
		return view('criteria.index',compact('criterias', 'nilai'),[
				"aktif" => "criteria",
				"judul" => "Data Kriteria",
				"title" => "Data Kriteria",
			]);
	}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$criteria = new Criteria;
		return view('criteria.create', compact('criteria'),  [
					"aktif" => "criteria",
					"judul" => "Data Kriteria",
					"title" => "Kriteria Tambah",
				
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
		$data = $request->validate([
				"kode" => "required",
				"nama_criteria" => "required",
				// "bobot_criteria" => "required|numeric",
				// "tipe" => "required",
		], 
		[
				"kode.required" => "Kode Kriteria tidak boleh kosong",
				"nama_criteria.required" => "Nama Kriteria tidak boleh kosong", 
				// "bobot_criteria.required" => "Bobot Kriteria tidak boleh kosong", 
				// "tipe.required" => "Jenis Kriteria tidak boleh kosong"
		]);

		Criteria::create($data);
		Toastr::success("Anda berhasil menambahkan $request->nama");
		return redirect()->route('criteria.index');
		
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
		$criteria = Criteria::find($id);
		// yuhuu
		if (auth()->user()->roles == "DM") {
			return view('criteria.edit', compact('criteria'),[
				"aktif" => "criteria",
				"judul" => "Penilaian Bobot",
				"title" => "Penilaian Bobot",
			]);
		}
	
		else{
			return view('criteria.edit', compact('criteria'),[
					"aktif" => "criteria",
					"judul" => "Data Kriteria",
					"title" => "Data Kriteria",
				]);
	
		}
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
		if (auth()->user()->roles == "DM") {
					$request->validate([
					"kode" => "required",
					"nama_criteria" => "required",
					"bobot_criteria" => "required",
					"tipe" => "required",
			]);
	
			$criteria->update([
					"kode" => $request->kode,
					"nama_criteria" => $request->nama_criteria,
					"bobot_criteria" => $request->bobot_criteria,
					"tipe" => $request->tipe,
	
			]);
			
		}
		else {
			  $request->validate([
				"kode" => "required",
				"nama_criteria" => "required",
				// "bobot_criteria" => "required",
				// "tipe" => "required",
			 
		]);
		$criteria->update([
				"kode" => $request->kode,
				"nama_criteria" => $request->nama_criteria,
				// "bobot_criteria" => $request->bobot_criteria,
				// "tipe" => $request->tipe,
		]);
		}
		
		
		Toastr::success("Anda berhasil mengubah $criteria->nama_criteria");
		return redirect()->route('criteria.index');
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