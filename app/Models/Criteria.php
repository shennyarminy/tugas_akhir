<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function subcriterias(){
        return $this->hasMany(Subcriteria::class);
    }

    public function alternatifs(){
        return $this->hasManyThrough(Alternatif::class, Subcriteria::class); 
    }
}