<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peminjaman')->insert([
            [
               'anggotas_id'=>'1',
               'bukus_id'=>'1',
               'tanggal_pinjam'=>'2022-06-20',
               'lama_peminjaman'=>7,
               'user_id'=>1,
               'status'=>1,
            
               
            ],
            [
               'anggotas_id'=>'2',
               'bukus_id'=>'2',
               'tanggal_pinjam'=>'2022-06-21',
               'lama_peminjaman'=>7,
               'user_id'=>2,
                'status'=>2,
            ],
            [
               'anggotas_id'=>'3',
               'bukus_id'=>'3',
               'tanggal_pinjam'=>'2022-06-22',
               'lama_peminjaman'=>6,
               'user_id'=>1,
                'status'=>2,
            ]
            ]);
    }
}
