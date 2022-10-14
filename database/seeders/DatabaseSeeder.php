<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Criteria;
use App\Models\perhitungan;
use App\Models\Subcriteria;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\siswaSeeder;
use Database\Seeders\CriteriaSeeder;
use Database\Seeders\perhitunganSeeder;
use Database\Seeders\SubcriteriaSeeder;

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
        // $this->call(UserSeeder::class);
        // $this->call(CriteriaSeeder::class);
        // $this->call(SubcriteriaSeeder::class);
        // $this->call(perhitunganSeeder::class);

        $this->call([
            UserSeeder::class,
            CriteriaSeeder::class,
            SubcriteriaSeeder::class,
            SiswaSeeder::class,
            // PerhitunganSeeder::class,

        ]);
    }
}
