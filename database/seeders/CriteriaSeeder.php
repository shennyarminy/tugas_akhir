<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Criteria::create(
            [
                'kode' => 'C1',
                'nama_criteria' => 'PEKERJAAN AYAH',
                'bobot_criteria' => 0.20,
                'tipe' => 'cost',

            ],
        );
        Criteria::create([

            'kode' => 'C2',
            'nama_criteria' => 'PEKERJAAN IBU',
            'bobot_criteria' => 0.15,
            'tipe' => 'cost',
        ]);

        Criteria::create([

            'kode' => 'C3',
            'nama_criteria' => 'PENGHASILAN',
            'bobot_criteria' => 0.15,
            'tipe' => 'cost',
        ]);
        Criteria::create([

            'kode' => 'C4',
            'nama_criteria' => 'JUMLAH TANGGUNGAN',
            'bobot_criteria' => 0.15,
            'tipe' => 'benefit',
        ]);
        Criteria::create([

            'kode' => 'C5',
            'nama_criteria' => 'NILAI RAPOT',
            'bobot_criteria' => 0.05,
            'tipe' => 'benefit',
        ]);
        Criteria::create([

            'kode' => 'C6',
            'nama_criteria' => 'PERINGKAT',
            'bobot_criteria' => 0.05,
            'tipe' => 'benefit',
        ]);
        Criteria::create([

            'kode' => 'C7',
            'nama_criteria' => 'WAKTU TEMPUH',
            'bobot_criteria' => 0.10,
            'tipe' => 'benefit',
        ]);
        Criteria::create([

            'kode' => 'C8',
            'nama_criteria' => 'STATUS ORANGTUA',
            'bobot_criteria' => 0.15,
            'tipe' => 'benefit',
        ]);
    }
}
