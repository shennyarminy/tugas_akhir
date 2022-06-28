<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'criteria_id'];
    
   
    public function subcriterias()
    {
      return $this->belongsToMany(Subcriteria::class, 'alternatif_details', 'alternatif_id', 'subcriteria_id');
    }


    public function alternatif_details()
    {
        return $this->hasMany(AlternatifDetail::class); 
    }

    public function counts()
    {
      return $this->belongsTo(Count::class);
    }

}
