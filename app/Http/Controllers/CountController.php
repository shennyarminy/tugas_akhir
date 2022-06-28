<?php

namespace App\Http\Controllers;

use App\Models\Count;
use App\Models\Criteria;
use App\Models\Alternatif;
use App\Models\Subcriteria;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class CountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcriterias = DB::table('subcriterias')->select('namas')->get();
        
        
        return view('count.index', [
            "aktif" => "perhitungan",
            "judul" => "Data Perhitngan",
            "title" => "Perhitungan",
            "alternatifs" => Alternatif::all(),
            "criterias" => Criteria::all(),
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Count  $count
     * @return \Illuminate\Http\Response
     */
    public function show(Count $count)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Count  $count
     * @return \Illuminate\Http\Response
     */
    public function edit(Count $count)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Count  $count
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Count $count)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Count  $count
     * @return \Illuminate\Http\Response
     */
    public function destroy(Count $count)
    {
        //
    }
}
