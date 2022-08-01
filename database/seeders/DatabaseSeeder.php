<?php

namespace Database\Seeders;

use App\Models\Criteria;
use App\Models\Subcriteria;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'nama' => 'Admin',
            'username' => 'Admin1',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345')
        ]);

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
