<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Criteria;
use App\Models\Alternatif;
use App\Models\Subcriteria;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\AlternatifDetail;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class CountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function matrix()
    { 
        $detail = AlternatifDetail::select(
            'alternatif_details.id as id',
            'alternatifs.id as alt',
            'criterias.id as cri',
            'subcriterias.id as sub',
            'alternatifs.nama_alternatif as alt_nama', 
            'criterias.nama_criteria as cri_nama',
            'subcriterias.nilai_subcriteria as sub_nilai')
            ->leftJoin('alternatifs', 'alternatifs.id', '=', 'alternatif_details.alternatif_id')
            ->leftJoin('criterias', 'criterias.id', '=', 'alternatif_details.criteria_id')
            ->leftJoin('subcriterias', 'subcriterias.id', '=', 'alternatif_details.subcriteria_id')
            
            ->get();
      
            $alternatif = Alternatif::get();
            $criterias = Criteria::get();
            $matrix = Helper::matrix();
           
      
      
          return view('count.matrix',compact('detail', 'alternatif', 'criterias', 'matrix'), [
            "aktif" => "matrix",
            "judul" => "Data matrix",
            "title" => "matrix",
          
            "subcriterias" => Subcriteria::all(),
          ]);

    }


    public function normalization(){

      $alternatifs = Alternatif::get();
      $criterias = Criteria::get();
     
      $matrix = Helper::matrix();
      $normalization = Helper::normalization(); 

          return view('count.normalization', compact('normalization', 'criterias', 'alternatifs', 'matrix'),[
            "aktif" => "normalisasi",
            "judul" => "normalization",
            "title" => "normalization",
          ]);


        }

        public function optimization(){
          $alternatif = Helper::getAlternatif();
          $optimization = Helper::optimization();

          return view('count.optimization', compact( 'alternatif', 'optimization'),[
            "aktif" => "optimasi",
            "judul" => "optimization",
            "title" => "optimization",
          ]);

        }

      

       
    }



    
