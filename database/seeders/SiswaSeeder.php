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
            'nama_siswa' => 'Kenji Denista Saputra',
            'nis' => 4277,
            'nisn' =>  317270,
            'nama_ayah' => "Zul Asmi",
            'nama_ibu' => "Sri Kurnia", 
            'alamat' => "Desa Istana"

        ]);
        siswa::create([
            'nama_siswa' => 'Purnama Zhelfi Alfika',
            'nis' => 4285,
            'nisn' =>  318076,
            'nama_ayah' => "Gugun",
            'nama_ibu' => "Krisdayanti",
            'alamat' => "Desa Istana",

        ]);
        siswa::create([
            'nama_siswa' => 'Daniel Alpiansah',
            'nis' => 4272,
            'nisn' =>  314272,
            'nama_ayah' => "M. Ahmadi",
            'nama_ibu' => "Juliana", 
            'alamat' => "Desa Istana"

        ]);
        siswa::create([
            'nama_siswa' => 'Reski Saputra',
            'nis' => 4286,
            'nisn' => 314286,
            'nama_ayah' => "Samsudin",
            'nama_ibu' => "Suwardah",
            'alamat' => "Desa Istana"

        ]);
        siswa::create([
            'nama_siswa' => 'Fita Al-Zahra',
            'nis' => 4273,
            'nisn' => 314273,
            'nama_ayah' => "Amran",
            'nama_ibu' => "Septiana",
            'alamat' => "Desa Istana"

        ]);
        siswa::create([
            'nama_siswa' => 'Fatta Arrazaq',
            'nis' => 4272,
            'nisn' =>  314272,
            'nama_ayah' => "Suharni",
            'nama_ibu' => "Ayu Haniah",
            'alamat' => "Desa Istana"

        ]);
        siswa::create([
            'nama_siswa' => 'Vero Alfatih',
            'nis' => 4289,
            'nisn' => 314289,
            'nama_ayah' => "Hasimun",
            'nama_ibu' => "Normala",
            'alamat' => "Desa Istana"

        ]);
        siswa::create([
            'nama_siswa' => 'Jahrah',
            'nis' => 4275,
            'nisn' =>  314275,
            'nama_ayah' => "Aidia",
            'nama_ibu' => "Suriana",
            'alamat' => "Desa Istana",

        ]);
        siswa::create([
            'nama_siswa' => 'Aprilia',
            'nis' => 4269,
            'nisn' =>  314269,
            'nama_ayah' => "Sahbana",
            'nama_ibu' => "Kiki",
            'alamat' => "Desa Istana"

        ]);
        siswa::create([
            'nama_siswa' => 'Abjil Qodir',
            'nis' => 4267,
            'nisn' =>  314267,
            'nama_ayah' => "Yudianto",
            'nama_ibu' =>  "Dewi",
            'alamat' => "Desa Istana"

        ]);
    }
}
