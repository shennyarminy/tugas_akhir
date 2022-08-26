<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Criteria;
use App\Models\siswa;
use App\Models\Subcriteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\siswaDetail;

class CountController extends Controller
{
  public function matrix()
  {
    $siswa = siswa::get();
    $criterias = Criteria::get();
    $siswa_details = siswaDetail::get();
    $matrix = Helper::matrix();
    return view('count.matrix', compact('siswa_details', 'siswa', 'criterias', 'matrix'), [
      "aktif" => "matrix",
      "judul" => "Data matrix",
      "title" => "matrix",


    ]);
  }

  public function normalization()
  {

    $siswas = siswa::get();
    $criterias = Criteria::get();

    $matrix = Helper::matrix();
    $normalization = Helper::normalization();

    return view('count.normalization', compact('normalization', 'criterias', 'siswas', 'matrix'), [
      "aktif" => "normalisasi",
      "judul" => "normalization",
      "title" => "normalization",
    ]);
  }

  public function optimization()
  {
    $siswa = Helper::getsiswa();
    $optimization = Helper::optimization();

    return view('count.optimization', compact('siswa', 'optimization'), [
      "aktif" => "optimasi",
      "judul" => "optimization",
      "title" => "optimization",
    ]);
  }
}
