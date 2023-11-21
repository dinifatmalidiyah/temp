<?php

namespace App\Http\Controllers;

use App\Models\KlasMesin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class KlasMesinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //FUNGSI ELOQUENT MENAMPILKAN DATA MENGGUNAKAN PAGINATION
        $kategori = $kategori = DB::table('klasmesin')->get();

        //MENGGAMBIL SEMUA ISI TABEL
        $post = KlasMesin::latest();

        //ADD PAGINATION
        return view('klasmesin.index', [
            'data_kategoris' => $kategori,

            //FUNGSI LATEST UNTUK MENAMPILKAN BERDASARKAN DATA PALING AKHIR DI INPUT
            'post' => KlasMesin::latest()->paginate(4)

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klasmesin.create', [
            'klasmesin' => KlasMesin::all()
        ]);
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
            'nama_klasifikasi' => 'required',
            'kode_klasifikasi' => 'required',
        ]);

        KlasMesin::create($cek);
        return redirect('/klasifikasi-mesin')
            ->with('success', 'Kategori Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tes = KlasMesin::where('id', $id)->first();
        return view('klasmesin.edit', [
            'klasmesin' => $tes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'nama_klasifikasi' => 'required',
            'kode_klasifikasi' => 'required',
        ];

        $validateData = $request->validate($rules);

        KlasMesin::where('id', $id)->update($validateData);
        return redirect('/klasifikasi-mesin')->with('success', 'Klasifikasi Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KlasMesin::destroy($id);
        return redirect('/klasifikasi-mesin')->with('success', 'Data  Berhasil Dihapus!');
    }
}
