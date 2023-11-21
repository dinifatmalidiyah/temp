<?php

namespace App\Http\Controllers;

use App\Models\DataAnggota;
use App\Models\DataBuku;
use App\Models\DataKategori;
use App\Models\DataMesin;
use App\Models\Peminjaman as ModelsPeminjaman;
use App\Models\Pengembalian;
use App\Models\KategoriMesin;
use App\Models\KlasMesin;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahKlasifikasi = DataMesin::select('klas_mesin', DB::raw('count(*) as jumlah'))
            ->groupBy('klas_mesin')
            ->get()
            ->sortBy('klas_mesin');

        $jumlahKategori = DataMesin::select('nama_kategori', DB::raw('count(*) as jumlah'))
            ->groupBy('nama_kategori')
            ->get()
            ->sortBy('nama_kategori');

        return view('index', [
            'jumlahKategori' => $jumlahKategori,
            'jumlahKlasifikasi' => $jumlahKlasifikasi,
            'jumlah_anggota' => DataAnggota::count(),
            'jumlah_petugas' => User::count(),
            'jumlah_buku' => DataBuku::count(),
            'jumlah_mesin' => DataMesin::count(),
            'jumlah_kategori' => KategoriMesin::count(),
            'jumlah_klasifikasi' => KlasMesin::count(),
            'jumlah_kategori' => KategoriMesin::count(),
            'jumlah_pengembalian' => Pengembalian::count(),
            'jumlah_peminjaman' => ModelsPeminjaman::count()
        ]);
    }
}
