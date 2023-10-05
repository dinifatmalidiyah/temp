<?php

namespace App\Http\Controllers;

use App\Models\DataAnggota;
use App\Models\DataBuku;
use App\Models\DataKategori;
use App\Models\Peminjaman as ModelsPeminjaman;
use App\Models\Pengembalian;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('index',[
            'jumlah_anggota'=> DataAnggota::count(),
            'jumlah_petugas' => User::count(),
            'jumlah_buku' => DataBuku::count(),
            'jumlah_kategori' => DataKategori::count(),
            'jumlah_pengembalian'=> Pengembalian::count(),
            'jumlah_peminjaman' => ModelsPeminjaman::count()
        ]);
    }
}
