<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Criteria;
use App\Models\Subcriteria;
use Illuminate\Database\Seeder;
use App\Models\AlternatifDetail;
use Database\Seeders\CriteriaSeeder;
use Database\Seeders\AlternatifSeeder;
use Database\Seeders\SubcriteriaSeeder;
use Database\Seeders\AlternatifDetailSeeder;

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
        // $this->call(AlternatifDetailSeeder::class);

        $this->call([
            // UserSeeder::class,
            CriteriaSeeder::class,
            SubcriteriaSeeder::class,
            AlternatifSeeder::class,
            AlternatifDetailSeeder::class,

        ]);

       
    }
}
