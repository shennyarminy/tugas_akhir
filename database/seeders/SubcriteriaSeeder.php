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
        // C1
        Subcriteria::create(
            [
                'criteria_id' => 1,
                'nama_subcriteria' => 'TIDAK BEKERJA',
                'nilai_subcriteria' => 5,
            ],

        );
        Subcriteria::create(
            [
                'criteria_id' => 1,
                'nama_subcriteria' => 'PETANI',
                'nilai_subcriteria' => 4,
            ],

        );
        Subcriteria::create(
            [
                'criteria_id' => 1,
                'nama_subcriteria' => 'WIRASWASTA',
                'nilai_subcriteria' => 3,
            ],

        );
        Subcriteria::create(
            [
                'criteria_id' => 1,
                'nama_subcriteria' => 'SWASTA',
                'nilai_subcriteria' => 2,
            ],

        );
        Subcriteria::create(
            [
                'criteria_id' => 1,
                'nama_subcriteria' => 'PNS',
                'nilai_subcriteria' => 1,
            ],

        );


        // C2
        Subcriteria::create([
            'criteria_id' => 2,
            'nama_subcriteria' => 'IRT (IBU RUMAH TANGGA)',
            'nilai_subcriteria' => 5,
        ]);
        Subcriteria::create([
            'criteria_id' => 2,
            'nama_subcriteria' => 'PETANI',
            'nilai_subcriteria' => 4,
        ]);
        Subcriteria::create([
            'criteria_id' => 2,
            'nama_subcriteria' => 'WIRASWASTA',
            'nilai_subcriteria' => 3,
        ]);
        Subcriteria::create([
            'criteria_id' => 2,
            'nama_subcriteria' => 'SWASTA',
            'nilai_subcriteria' => 2,
        ]);
        Subcriteria::create([
            'criteria_id' => 2,
            'nama_subcriteria' => 'PNS',
            'nilai_subcriteria' => 1,
        ]);
        
        // C3

        Subcriteria::create([
            'criteria_id' => 3,
            'nama_subcriteria' => 'KURANG DARI 1.000.000',
            'nilai_subcriteria' => 5,
        ]);
        Subcriteria::create([
            'criteria_id' => 3,
            'nama_subcriteria' => '1.000.000-2.000.000',
            'nilai_subcriteria' => 3,
        ]);
        Subcriteria::create([
            'criteria_id' => 3,
            'nama_subcriteria' => 'LEBIH DARI 2.000.000',
            'nilai_subcriteria' => 1,
        ]);
      
      

        // C4

        Subcriteria::create([
            'criteria_id' => 4,
            'nama_subcriteria' => 'LEBIH DARI 5',
            'nilai_subcriteria' => 5,
        ]);
        Subcriteria::create([
            'criteria_id' => 4,
            'nama_subcriteria' => '3-4',
            'nilai_subcriteria' => 3,
        ]);
        Subcriteria::create([
            'criteria_id' => 4,
            'nama_subcriteria' => 'KURANG DARI 2',
            'nilai_subcriteria' => 1,
        ]);
       
        // C5

        Subcriteria::create([
            'criteria_id' => 5,
            'nama_subcriteria' => '90-100',
            'nilai_subcriteria' => 5,
        ]);
        Subcriteria::create([
            'criteria_id' => 5,
            'nama_subcriteria' => '80-89',
            'nilai_subcriteria' => 3,
        ]);
        Subcriteria::create([
            'criteria_id' => 5,
            'nama_subcriteria' => '70-79',
            'nilai_subcriteria' => 1,
        ]);
      
        
        // C6
        Subcriteria::create([
            'criteria_id' => 6,
            'nama_subcriteria' => '1-3',
            'nilai_subcriteria' => 5,
        ]);
        Subcriteria::create([
            'criteria_id' => 6,
            'nama_subcriteria' => '4-10',
            'nilai_subcriteria' => 3,
        ]);
        Subcriteria::create([
            'criteria_id' => 6,
            'nama_subcriteria' => '11-15',
            'nilai_subcriteria' => 1,
        ]);
       
        // C7

        Subcriteria::create([
            'criteria_id' => 7,
            'nama_subcriteria' => 'LEBIH DARI 21 MENIT',
            'nilai_subcriteria' => 5,
        ]);

        Subcriteria::create([
            'criteria_id' => 7,
            'nama_subcriteria' => '11-20 MENIT',
            'nilai_subcriteria' => 3,
        ]);

        Subcriteria::create([
            'criteria_id' => 7,
            'nama_subcriteria' => '1-10 MENIT',
            'nilai_subcriteria' => 1,
        ]);

      

        // C8

        Subcriteria::create([
            'criteria_id' => 8,
            'nama_subcriteria' => 'YATIM PIATU',
            'nilai_subcriteria' => 5,
        ]);
        Subcriteria::create([
            'criteria_id' => 8,
            'nama_subcriteria' => 'YATIM/PIATU',
            'nilai_subcriteria' => 3,
        ]);
        Subcriteria::create([
            'criteria_id' => 8,
            'nama_subcriteria' => 'LENGKAP',
            'nilai_subcriteria' => 1,
        ]);
    }



}
