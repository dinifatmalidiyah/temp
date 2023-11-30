<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
use App\Models\DataMesin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermintaanController extends Controller
{
    public function index()
    {
        return view('pelaporan.permintaan.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelaporan.permintaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek = $request->validate([
            'nama' => 'required',
        ]);

        Plant::create($cek);
        return redirect('/pengajuan1')
            ->with('success', 'Plant Berhasil Ditambahkan');
    }
    function generateNomorRegistrasi()
    {
        $lastNumber = DB::table('datamesin')->max('nomor_registrasi');
        $lastNumber = $lastNumber ? $lastNumber + 1 : 1;

        return sprintf('001/WS/XII/%d', date('Y')) . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
    }
}
