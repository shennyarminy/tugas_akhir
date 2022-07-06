<?php

namespace App\Models;

use App\Models\Count;
use App\Models\Criteria;
use App\Models\Alternatif;
use App\Models\AlternatifDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subcriteria extends Model
{
    use HasFactory;

    protected $table = 'subcriterias';

    protected $fillable = [
        'criteria_id', 
        'nama_subcriteria',
        'nilai_subcriteria',
    ];

    // public function criteria(){
    //     return $this->belongsTo(Criteria::class);
    // }

    
    // public function alternatifs(){
    //     return $this->belongsToMany(Alternatif::class, 'alternatif_details', 'alternatif_id', 'subcriteria_id');
    // }

    // public function counts()
    // {
    //   return $this->belongsTo(Count::class);
    // }
    
    // public function alternatif_details()
    // {
    //     return $this->hasMany(AlternatifDetail::class);
    // }


}
