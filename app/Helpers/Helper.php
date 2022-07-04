<?php
namespace App\Helpers;

use App\Models\Criteria;

use App\Models\Alternatif;
use App\Models\AlternatifDetail;
use Illuminate\Support\Facades\DB;



class Helper

{
  public static function Normalization(){


    $detail = AlternatifDetail::select(
      'alternatif_details.id as id',
      'alternatifs.id as alt',
      'criterias.id as cri',
      'subcriterias.id as sub',
      'alternatifs.nama_alternatif as alt_nama', 
      'criterias.nama_criteria as cri_nama',
      'subcriterias.nama_subcriteria as sub_nama')
      ->leftJoin('alternatifs', 'alternatifs.id', '=', 'alternatif_details.alternatif_id')
      ->leftJoin('criterias', 'criterias.id', '=', 'alternatif_details.criteria_id')
      ->leftJoin('subcriterias', 'subcriterias.id', '=', 'alternatif_details.subcriteria_id')
      ->get();

    


      $criteria = Criteria::get();
      $alternatif = Alternatif::get();
      $alternatif_detail = AlternatifDetail::get();

      $normalization = $detail; 
      
      foreach($criteria as $cri => $c ){

      
    
          $divider = 0;
            foreach ($alternatif as $alt => $a){
              $divider+= pow($alternatif_detail[$alt][$cri], 2);
            }

        foreach ($alternatif as $alt => $a){
          $normalization[$alt][$cri] /= sqrt($divider);
        }
      
    
  }

    return  $normalization;

}
}