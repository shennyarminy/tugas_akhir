<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Criteria;
use App\Models\Alternatif;
use App\Models\Subcriteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AlternatifDetail;

class CountController extends Controller
{
    public function matrix()
    { 
            $alternatif = Alternatif::get();
            $criterias = Criteria::get();
            $alternatif_details = AlternatifDetail::get();
            $matrix = Helper::matrix();
          return view('count.matrix',compact( 'alternatif_details','alternatif', 'criterias', 'matrix'), [
            "aktif" => "matrix",
            "judul" => "Data matrix",
            "title" => "matrix",
          
            
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
