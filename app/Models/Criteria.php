<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function subcriterias()
    {
        return $this->hasMany(Subcriteria::class);
    }

    // public function siswas(){
    //     return $this->hasManyThrough(siswa::class, Subcriteria::class); 
    // }

    public function siswas()
    {
        return $this->hasManyThrough(Siswa::class, Subcriteria::class);
    }
}
