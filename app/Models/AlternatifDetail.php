<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternatifDetail extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function alternatif(){
        return $this->belongsTo(Alternatif::class);
    }

    public function subcriteria(){
        return $this->belongsTo(Subcriteria::class); 
    }


}
