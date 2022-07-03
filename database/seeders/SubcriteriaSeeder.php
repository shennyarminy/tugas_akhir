<?php

namespace Database\Seeders;

use App\Models\Subcriteria;
use Illuminate\Database\Seeder;

class SubcriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcriteria::create(
            [
                'criteria_id' => 1,
                'nama_subcriteria' => 'PNS',
                'nilai_subcriteria' => 2,
            ],

        );
        Subcriteria::create([
            'criteria_id' => 2,
            'nama_subcriteria' => 'UANG',
            'nilai_subcriteria' => 3,
        ]);
        Subcriteria::create(
            [
                'criteria_id' => 1,
                'nama_subcriteria' => 'SWASTA',
                'nilai_subcriteria' => 3,
            ],

        );
        Subcriteria::create([
            'criteria_id' => 2,
            'nama_subcriteria' => 'KEKAYAAN',
            'nilai_subcriteria' => 3,
        ]);
    }
}
