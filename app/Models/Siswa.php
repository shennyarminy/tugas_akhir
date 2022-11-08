<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
  use HasFactory;
  protected $guarded = ['id', 'criteria_id'];


  public function subcriterias()
  {
    return $this->belongsToMany(Subcriteria::class, 'perhitungans', 'siswa_id', 'subcriteria_id');
  }


  public function perhitungans()
  {
    return $this->hasMany(Perhitungan::class);
  }
}
