<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perhitungan extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function siswa()
    {
        return $this->belongsTo(siswa::class);
    }

    public function subcriteria()
    {
        return $this->belongsTo(Subcriteria::class);
    }
}
