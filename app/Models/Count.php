<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Count extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function alternatifs(){
        return $this->hasMany(Alternatif::class);
    }

    public function subcriterias(){
        return $this->hasMany(Subcriteria::class); 
    }
}
