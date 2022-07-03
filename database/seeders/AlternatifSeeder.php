<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use App\Models\AlternatifDetail;
use Illuminate\Database\Seeder;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alternatif::create([
            'nama_alternatif' => 'Ahsan',
            
        ]);

        AlternatifDetail::create([
            'alternatif_id' => 1,
            'criteria_id' => 1,
            'subcriteria_id' => 3, 
        ]);
        AlternatifDetail::create([
            'alternatif_id' => 1,
            'criteria_id' => 2,
            'subcriteria_id' => 4, 
        ]);
    }
}
