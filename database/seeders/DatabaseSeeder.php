<?php

namespace Database\Seeders;

use App\Models\AlternatifDetail;
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
        // $this->call(UserSeeder::class);
        // $this->call(CriteriaSeeder::class);
        // $this->call(SubcriteriaSeeder::class);
        // $this->call(AlternatifDetailSeeder::class);

        $this->call([
            UserSeeder::class,
            CriteriaSeeder::class,
            SubcriteriaSeeder::class,
            AlternatifSeeder::class

        ]);

       
    }
}
