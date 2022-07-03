<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Criteria::create(
            [
                'kode' => 'C1',
                'nama_criteria' => 'PEKERJAAN',
                'bobot_criteria' => 3,
                'tipe' => 'cost',

            ],
        );
        Criteria::create([

            'kode' => 'C2',
            'nama_criteria' => 'PENGHASILAN',
            'bobot_criteria' => 2,
            'tipe' => 'cost',
        ]);
    }
}
