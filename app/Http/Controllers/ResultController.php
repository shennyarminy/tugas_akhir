<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Helpers\Helper;
use App\Models\Criteria;
use App\Models\Perhitungan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \PDF;

class ResultController extends Controller
{
  private function countCriteria()
  {
    // supaya menghindari divinder from zero dan memberikan nilai satu saat di dd 
    // membuat nilai criteria menjadi satu, memfilter data menggunakan array
    $getCriteria = Criteria::all();
    $arrayCriteria = json_decode(json_encode($getCriteria), true);
    $criteria = array();

    foreach ($arrayCriteria as $row) {
      $criteria[$row['id']] = array($row['nama_criteria'], $row['tipe'], $row['bobot_criteria']);
    }

    return $criteria;
  }

  private function countSiswa()
  {
    $getsiswa = siswa::all();
    $arraysiswa = json_decode(json_encode($getsiswa), true);
    $siswa = array();

    foreach ($arraysiswa as $row) {
      $siswa[$row['id']] = array($row['nama_siswa']);
    }

    return $siswa;
  }

  private function countMatrix()
  {

    $detail = perhitungan::select(
      'perhitungans.id as id',
      'siswas.id as alt',
      'criterias.id as cri',
      'subcriterias.id as sub',
      'siswas.nama_siswa as alt_nama',
      'criterias.nama_criteria as cri_nama',
      'subcriterias.nilai_subcriteria as sub_nilai'
    )
      ->leftJoin('siswas', 'siswas.id', '=', 'perhitungans.siswa_id')
      ->leftJoin('criterias', 'criterias.id', '=', 'perhitungans.criteria_id')
      ->leftJoin('subcriterias', 'subcriterias.id', '=', 'perhitungans.subcriteria_id')
      ->get();

    $criteria = Criteria::get();
    $siswa = siswa::get();
    //  berguna untuk memberikan nilai unk result 
    $result = $detail;
    //membuat matrix menjadi array  
    $matrix = array();

    foreach ($result as $score) {
      // memasukkan nilai siswa ke dalam alt array assosiatif yg sudah di masukkan ke variabel detail 
      $siswa = $score['alt'];
      $criteria = $score['cri'];


      $sub = $score['sub_nilai'];
      // untuk nilai matrix 
      $matrix[$siswa][$criteria] = $sub;
    }

    return $matrix;
  }

  private function countNorma()
  {
    $siswa = $this->countSiswa();
    $criteria = $this->countCriteria();
    $matrix = $this->countMatrix();
    $normalization = $matrix;
    foreach ($criteria as $cri => $c) {

      $divider = 0;

      foreach ($siswa as $alt => $a) {
        $divider += pow($matrix[$alt][$cri], 2);
        // kudrat pangkat dua 
      }

      foreach ($siswa as $alt => $a) {
        $normalization[$alt][$cri] /= sqrt($divider);
        // nilai akar
      }
    }

    return $normalization;
  }

  private function countOpti()
  {

    $criteria = $this->countCriteria();
    $siswa = $this->countSiswa();
    $normalization = $this->countNorma();

    $optimization = array();
    foreach ($siswa as $alt => $a) {
      $optimization[$alt] = 0;
      foreach ($criteria as $cri => $c) {
        $optimization[$alt] += $normalization[$alt][$cri] * ($c[1] == 'benefit' ? 1 : -1) * $c[2];

        // += adalah nilai yang lama ditambah dengan nilai yang baru 
      }
    }
    return $optimization;
  }
  // BATAS PRIVATE FUNCTION

  // PUBLIC FUNCTION 
  public function matrix()
  {
    $siswa = Siswa::get();
    $criterias = Criteria::get();
    $perhitungans = Perhitungan::get();
    $matrix = $this->countMatrix();
    return view('count.matrix', compact('perhitungans', 'siswa', 'criterias', 'matrix'), [
      "aktif" => "matrix",
      "judul" => "Data matrix",
      "title" => "matrix",
    ]);
  }

  public function normalization()
  {

    $siswas = Siswa::get();
    $criterias = Criteria::get();

    $matrix = $this->countMatrix();
    $normalization = $this->countNorma();

    return view('count.normalization', compact('normalization', 'criterias', 'siswas', 'matrix'), [
      "aktif" => "normalisasi",
      "judul" => "normalization",
      "title" => "normalization",
    ]);
  }

  public function optimization()
  {
    $siswa = $this->countSiswa();
    $optimization = $this->countOpti();

    return view('count.optimization', compact('siswa', 'optimization'), [
      "aktif" => "optimasi",
      "judul" => "optimization",
      "title" => "optimization",
    ]);
  }
  public function ranking()
  {
    $siswa = $this->countSiswa();
    $optimization = $this->countOpti();

    // mengurutkan data secara desc dengan tetap mempertahankan key/index arraynya 
    asort($optimization);
    // mendapatkan key/index item array yang pertama
    $index = key($optimization);
    $rank = 1;
    return view('result.hasil', compact('siswa', 'optimization', 'rank'), [
      "aktif" => "ranking",
      "judul" => "Data Hasil Akhir",
      "title" => "Data Hasil Akhir",
    ]);
  }

  public function cetak()
  {
    $siswa = $this->countSiswa();
    $optimization = $this->countOpti();

    // mengurutkan data secara desc dengan tetap mempertahankan key/index arraynya 
    asort($optimization);
    // mendapatkan key/index item array yang pertama
    $index = key($optimization);
    $rank = 1;
    view()->share('siswa', 'optimization', 'rank', $siswa, $optimization, $rank);
    $pdf = PDF::loadView('result.cetak', compact('siswa', 'optimization', 'rank'));
    return $pdf->stream();
  }
}
