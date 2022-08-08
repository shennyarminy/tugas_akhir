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
                'nilai_subcriteria' => 50,
            ],

        );
        Subcriteria::create(
            [
                'criteria_id' => 1,
                'nama_subcriteria' => 'BURUH',
                'nilai_subcriteria' => 40,
            ],

        );
        Subcriteria::create(
            [
                'criteria_id' => 1,
                'nama_subcriteria' => 'SWASTA',
                'nilai_subcriteria' => 30,
            ],

        );
        Subcriteria::create(
            [
                'criteria_id' => 1,
                'nama_subcriteria' => 'PEDAGANG',
                'nilai_subcriteria' => 20,
            ],

        );
        Subcriteria::create(
            [
                'criteria_id' => 1,
                'nama_subcriteria' => 'PNS',
                'nilai_subcriteria' => 10,
            ],

        );


        // C2
        Subcriteria::create([
            'criteria_id' => 2,
            'nama_subcriteria' => 'IRT',
            'nilai_subcriteria' => 50,
        ]);
        Subcriteria::create([
            'criteria_id' => 2,
            'nama_subcriteria' => 'BURUH',
            'nilai_subcriteria' => 40,
        ]);
        Subcriteria::create([
            'criteria_id' => 2,
            'nama_subcriteria' => 'SWASTA',
            'nilai_subcriteria' => 30,
        ]);
        Subcriteria::create([
            'criteria_id' => 2,
            'nama_subcriteria' => 'PEDAGANG',
            'nilai_subcriteria' => 20,
        ]);
        Subcriteria::create([
            'criteria_id' => 2,
            'nama_subcriteria' => 'PNS',
            'nilai_subcriteria' => 10,
        ]);
        
        // C3

        Subcriteria::create([
            'criteria_id' => 3,
            'nama_subcriteria' => 'tidak berpenghasilan',
            'nilai_subcriteria' => 50,
        ]);
        Subcriteria::create([
            'criteria_id' => 3,
            'nama_subcriteria' => '<500rb',
            'nilai_subcriteria' => 40,
        ]);
        Subcriteria::create([
            'criteria_id' => 3,
            'nama_subcriteria' => '600k-1juta',
            'nilai_subcriteria' => 30,
        ]);
        Subcriteria::create([
            'criteria_id' => 3,
            'nama_subcriteria' => '1.1juta-2jt',
            'nilai_subcriteria' => 20,
        ]);
        Subcriteria::create([
            'criteria_id' => 3,
            'nama_subcriteria' => '>2.1jt',
            'nilai_subcriteria' => 10,
        ]);

        // C4

        Subcriteria::create([
            'criteria_id' => 4,
            'nama_subcriteria' => 'tidak berpenghasilan',
            'nilai_subcriteria' => 50,
        ]);
        Subcriteria::create([
            'criteria_id' => 4,
            'nama_subcriteria' => '<500rb',
            'nilai_subcriteria' => 40,
        ]);
        Subcriteria::create([
            'criteria_id' => 4,
            'nama_subcriteria' => '600k-1juta',
            'nilai_subcriteria' => 30,
        ]);
        Subcriteria::create([
            'criteria_id' => 4,
            'nama_subcriteria' => '1.1juta-2jt',
            'nilai_subcriteria' => 20,
        ]);
        Subcriteria::create([
            'criteria_id' => 4,
            'nama_subcriteria' => '>2.1jt',
            'nilai_subcriteria' => 10,
        ]);

        // C5

        Subcriteria::create([
            'criteria_id' => 5,
            'nama_subcriteria' => '>5',
            'nilai_subcriteria' => 50,
        ]);
        Subcriteria::create([
            'criteria_id' => 5,
            'nama_subcriteria' => '4',
            'nilai_subcriteria' => 40,
        ]);
        Subcriteria::create([
            'criteria_id' => 5,
            'nama_subcriteria' => '3',
            'nilai_subcriteria' => 30,
        ]);
        Subcriteria::create([
            'criteria_id' => 5,
            'nama_subcriteria' => '2',
            'nilai_subcriteria' => 20,
        ]);
        Subcriteria::create([
            'criteria_id' => 5,
            'nama_subcriteria' => '1',
            'nilai_subcriteria' => 10,
        ]);
        
        // C6
        Subcriteria::create([
            'criteria_id' => 6,
            'nama_subcriteria' => 'AKADEMIK',
            'nilai_subcriteria' => 30,
        ]);
        Subcriteria::create([
            'criteria_id' => 6,
            'nama_subcriteria' => 'NONAKADEMIK',
            'nilai_subcriteria' => 20,
        ]);
        Subcriteria::create([
            'criteria_id' => 6,
            'nama_subcriteria' => 'TIDAK ADA',
            'nilai_subcriteria' => 10,
        ]);
       
        // C7

        Subcriteria::create([
            'criteria_id' => 7,
            'nama_subcriteria' => 'YATIM PIATU',
            'nilai_subcriteria' => 40,
        ]);

        Subcriteria::create([
            'criteria_id' => 7,
            'nama_subcriteria' => 'YATIM',
            'nilai_subcriteria' => 30,
        ]);

        Subcriteria::create([
            'criteria_id' => 7,
            'nama_subcriteria' => 'PIATU',
            'nilai_subcriteria' => 20,
        ]);

        Subcriteria::create([
            'criteria_id' => 7,
            'nama_subcriteria' => 'NON YATIM PIATU',
            'nilai_subcriteria' => 10,
        ]);

        // C8

        Subcriteria::create([
            'criteria_id' => 8,
            'nama_subcriteria' => 'KEBAKARAN',
            'nilai_subcriteria' => 30,
        ]);
        Subcriteria::create([
            'criteria_id' => 8,
            'nama_subcriteria' => 'PHK',
            'nilai_subcriteria' => 20,
        ]);
        Subcriteria::create([
            'criteria_id' => 8,
            'nama_subcriteria' => 'TIDAK ADA',
            'nilai_subcriteria' => 10,
        ]);
    }



}
