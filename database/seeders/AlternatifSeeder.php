<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use App\Models\AlternatifDetail;
use Illuminate\Database\Seeder;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alternatif::create([
            'nama_alternatif' => 'Guntur',
            
        ]);
        Alternatif::create([
            'nama_alternatif' => 'Gilang',
            
        ]);
        Alternatif::create([
            'nama_alternatif' => 'Radit',
            
        ]);
        Alternatif::create([
            'nama_alternatif' => 'Lutfi',
            
        ]);
        Alternatif::create([
            'nama_alternatif' => 'Anggun',
            
        ]);
        Alternatif::create([
            'nama_alternatif' => 'Hanifa',
            
        ]);
        Alternatif::create([
            'nama_alternatif' => 'Auliyah',
            
        ]);
        Alternatif::create([
            'nama_alternatif' => 'Dicky',
            
        ]);
        Alternatif::create([
            'nama_alternatif' => 'Diva',
            
        ]);
        Alternatif::create([
            'nama_alternatif' => 'Yasir',
            
        ]);

      
    }
}
