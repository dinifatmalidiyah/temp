<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DataBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('data_bukus')->insert([
            [
                'judul_buku'=>'Naruto Shipuden Vol 30',
                'data_kategori_id'=>'1',
                'book_image'=>'',
                'nama_pengarang'=>' Mashashi Kishimoto',
                'penerbit'=>'CV. Anugerah Rajarjo',
                'tahun_terbit'=>' 2016 ',
                'jumlah_halaman'=>' 200 ',
                'user_id'=> 2 ,
                

            ],
           [
                 'judul_buku'=>'Naruto Shipuden Vol 1',
                'data_kategori_id'=>1,
                'book_image'=>'',
                'nama_pengarang'=>' Mashashi Kishimoto',
                'penerbit'=>'CV. Anugerah Rajarjo',
                'tahun_terbit'=>' 2016 ',
                'jumlah_halaman'=>' 200 ',
                'user_id'=>3
                

            ],
            [
                'judul_buku'=>'Naruto Shipuden Vol 45',
                'data_kategori_id'=>1,
                'book_image'=>'',
                'nama_pengarang'=>' Mashashi Kishimoto',
                'penerbit'=>'CV. Anugerah Rajarjo',
                'tahun_terbit'=>' 2016 ',
                'jumlah_halaman'=>' 200 ',
                'user_id'=>3

                

            ],
            [
                'judul_buku'=>'One Piece Vol 345',
                'data_kategori_id'=>1,
                'book_image'=>'',
                'nama_pengarang'=>' Eichiro Oda',
                'penerbit'=>'Weeboo Jaya Sentosa',
                'tahun_terbit'=>' 2015 ',
                'jumlah_halaman'=>' 240 ',
                'user_id'=>1

                

            ],
            [
                'judul_buku'=>'One Piece Vol 115',
                'data_kategori_id'=>1,
                'book_image'=>'',
                'nama_pengarang'=>'  Eichiro Oda',
                'penerbit'=>'Weeboo Jaya Sentosa',
                'tahun_terbit'=>' 2015 ',
                'jumlah_halaman'=>' 220 ',
                'user_id'=>2

                

            ],
              [
                'judul_buku'=>'One Piece Vol 215',
                'data_kategori_id'=>1,
                'book_image'=>'',
                'nama_pengarang'=>'  Eichiro Oda',
                'penerbit'=>'CV. Weeboo Jaya Sentosa',
                'tahun_terbit'=>' 2015 ',
                'jumlah_halaman'=>' 120 ',
                'user_id'=>3

                

            ],
            ]);
    }
}
