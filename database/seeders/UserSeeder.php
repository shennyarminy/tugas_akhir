<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        User::create([
            'nama' => 'Admin',
            'username' => 'Admin1',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'roles' => 'ADMIN',
        ]);
        User::create([
            'nama' => 'Admin2',
            'username' => 'Admin2',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('12345'),
            'roles' => 'ADMIN',
        ]);
     
        User::create([
            'nama' => 'DM',
            'username' => 'dm2',
            'email' => 'dm@gmail.com',
            'password' => bcrypt('12345'),
            'roles' => 'DM',
        ]);
    }
}
