<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
  use HasFactory;
  protected $guarded = ['id', 'criteria_id'];


  public function subcriterias()
  {
    return $this->belongsToMany(Subcriteria::class, 'siswa_details', 'siswa_id', 'subcriteria_id');
  }


  public function siswa_details()
  {
    return $this->hasMany(siswaDetail::class);
  }
}
