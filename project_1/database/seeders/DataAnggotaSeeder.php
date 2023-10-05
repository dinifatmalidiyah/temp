<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataAnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_anggotas')->insert([
            [
                'image' => '',
                'nama' => 'Najwa syarifah',
                'jeniskelamin' => 'Perempuan',
                'alamat' => 'jl. kejayan no 2 kabupaten Pasuruan',
                'notelp' => '08510178448',
                'tanggallahir' => '2002-12-08',
            ],
            [
                'image' => '',
                'nama' => 'Renata Putri',
                'alamat' => 'jl. warungdowo kabupaten Pasuruan',
                'jeniskelamin' => 'Perempuan',
                'notelp' => '08110177748',
                'tanggallahir' => '2002-09-05',
            ],
            [
                'image' => '',
                'nama' => 'Prayogo makarya',
                'alamat' => 'jl. purwosari kabupaten Pasuruan',
                'jeniskelamin' => 'Laki-Laki',
                'notelp' => '081515334678',
                'tanggallahir' => '2002-02-02',
            ],
            [
                'image' => '',
                'nama' => 'Danny Nugroho',
                'alamat' => 'jl. warung dowo kabupaten Pasuruan',
                'jeniskelamin' => 'Laki-Laki',
                'notelp' => '081345788654',
                'tanggallahir' => '2002-08-09',
            ],
            [
                'image' => '',
                'nama' => 'Diana Husein',
                'alamat' => 'jl. purwosari kabupaten Pasuruan',
                'jeniskelamin' => 'Perempuan',
                'notelp' => '081112346787',
                'tanggallahir' => '2002-07-07',
            ],
            [
                'image' => '',
                'nama' => 'Elisabeth Magdalena',
                'alamat' => 'jl. purwodadi kabupaten Pasuruan',
                'jeniskelamin' => 'Perempuan',
                'notelp' => '085101364753',
                'tanggallahir' => '2002-06-06',
            ]
            ]);
    }
}
