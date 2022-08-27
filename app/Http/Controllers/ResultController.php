<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;

use \PDF;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
  public function ranking()
  {
    $alternatif = Helper::getAlternatif();
    $optimization = Helper::optimization();

    // mengurutkan data secara desc dengan tetap mempertahankan key/index arraynya 
    asort($optimization);
    // mendapatkan key/index item array yang pertama
    $index = key($optimization);
    $rank = 1;
    return view('result.hasil', compact('alternatif', 'optimization', 'rank'), [
      "aktif" => "ranking",
      "judul" => "Data Hasil Akhir",
      "title" => "Data Hasil Akhir",
    ]);
  }

  public function cetak()
  {
    $alternatif = Helper::getAlternatif();
    $optimization = Helper::optimization();

    // mengurutkan data secara desc dengan tetap mempertahankan key/index arraynya 
    asort($optimization);
    // mendapatkan key/index item array yang pertama
    $index = key($optimization);
    $rank = 1;
    return view('result.cetak', compact('alternatif', 'optimization', 'rank'), [
      "aktif" => "ranking",
      "judul" => "ranking",
      "title" => "ranking",
    ]);
  }
  public function pdf()
  {
    $alternatif = Helper::getAlternatif();
    $optimization = Helper::optimization();

    // mengurutkan data secara desc dengan tetap mempertahankan key/index arraynya 
    asort($optimization);
    // mendapatkan key/index item array yang pertama
    $index = key($optimization);
    $rank = 1;

    view()->share('alternatif', 'optimization', 'rank', $alternatif, $optimization, $rank);
    $pdf = PDF::loadView('result.pdf', compact('alternatif', 'optimization', 'rank'));
    return $pdf->stream();

    // return view('result.cetak', compact('alternatif', 'optimization', 'rank'), [
    //   "aktif" => "ranking",
    //   "judul" => "ranking",
    //   "title" => "ranking",
    // ]);
  }
}
