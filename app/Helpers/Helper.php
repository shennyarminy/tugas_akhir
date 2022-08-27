<?php

namespace App\Helpers;

use App\Models\Criteria;

use App\Models\siswa;
use App\Models\perhitungan;
use App\Models\Subcriteria;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;



class Helper

{

  public static function getCriteria()
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

  public static function getsiswa()
  {

    $getsiswa = siswa::all();
    $arraysiswa = json_decode(json_encode($getsiswa), true);
    $siswa = array();

    foreach ($arraysiswa as $row) {
      $siswa[$row['id']] = array($row['nama_siswa']);
    }

    return $siswa;
  }



  public static function matrix()
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




  public static function  normalization()
  {


    $siswa = Helper::getsiswa();
    $criteria = Helper::getCriteria();
    $matrix = Helper::matrix();
    $normalization = $matrix;



    foreach ($criteria as $cri => $c) {

      $divider = 0;

      foreach ($siswa as $alt => $a) {
        $divider += pow($matrix[$alt][$cri], 2);
        // kudrat pangkat dua 

      }

      foreach ($siswa as $alt => $a) {
        $normalization[$alt][$cri] /= sqrt($divider);
        // akar 
      }
    }

    return $normalization;
  }

  public static function  optimization()
  {

    $criteria = Helper::getCriteria();
    $siswa = Helper::getsiswa();
    $normalization = Helper::normalization();

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
}
