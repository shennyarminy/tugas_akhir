<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternatifDetail extends Model
{
    use HasFactory;
    protected $table = 'alternatif_details';
    public $timestamps = false;
    

    public $fillable = [
        'alternatif_id',
        'criteria_id',
        'subcriteria_id',
    ];

    // public function alternatif(){
    //     return $this->belongsTo(Alternatif::class);
    // }

    // public function subcriteria(){
    //     return $this->belongsTo(Subcriteria::class); 
    // }


}
