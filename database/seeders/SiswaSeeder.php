<?php

namespace Database\Seeders;

use App\Models\siswa;
use App\Models\perhitungan;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        siswa::create([
            'nama_siswa' => 'Guntur',

        ]);
        siswa::create([
            'nama_siswa' => 'Gilang',

        ]);
        siswa::create([
            'nama_siswa' => 'Radit',

        ]);
        siswa::create([
            'nama_siswa' => 'Lutfi',

        ]);
        siswa::create([
            'nama_siswa' => 'Anggun',

        ]);
        siswa::create([
            'nama_siswa' => 'Hanifa',

        ]);
        siswa::create([
            'nama_siswa' => 'Auliyah',

        ]);
        siswa::create([
            'nama_siswa' => 'Dicky',

        ]);
        siswa::create([
            'nama_siswa' => 'Diva',

        ]);
        siswa::create([
            'nama_siswa' => 'Yasir',

        ]);
    }
}
