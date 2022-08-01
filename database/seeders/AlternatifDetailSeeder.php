<?php

namespace Database\Seeders;

use App\Models\AlternatifDetail;
use Illuminate\Database\Seeder;

class AlternatifDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AlternatifDetail::create([
            
            'alternatif_id' => 1,
            'criteria_id' => 3,
            'subcriteria_id' => 2,
            
        ]);
    }
}
