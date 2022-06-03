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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345')
        ]);

        Criteria::create(
            [
                'kode' => 'C1',
                'nama' => 'PEKERJAAN',
                'bobot' => 3,
                'tipe' => 'cost',

            ],
        );
        Criteria::create([

            'kode' => 'C2',
            'nama' => 'PENGHASILAN',
            'bobot' => 2,
            'tipe' => 'cost',
        ]);

        Subcriteria::create(
            [
                'criteria_id' => 1,
                'namas' => 'PNS',
                'nilai' => 2,
            ],

        );
        Subcriteria::create([
            'criteria_id' => 2,
            'namas' => 'UANG',
            'nilai' => 3,
        ]);
        Subcriteria::create(
            [
                'criteria_id' => 1,
                'namas' => 'SWASTA',
                'nilai' => 3,
            ],

        );
        Subcriteria::create([
            'criteria_id' => 2,
            'namas' => 'KEKAYAAN',
            'nilai' => 3,
        ]);
    }
}
