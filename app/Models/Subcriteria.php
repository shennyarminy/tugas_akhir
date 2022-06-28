<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcriteria extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function criteria(){
        return $this->belongsTo(Criteria::class);
    }

    
    public function alternatifs(){
        return $this->belongsToMany(Alternatif::class, 'alternatif_details', 'alternatif_id', 'subcriteria_id');
    }

    public function counts()
    {
      return $this->belongsTo(Count::class);
    }


}
