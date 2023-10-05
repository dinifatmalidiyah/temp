<?php

namespace App\Http\Controllers;

use App\Models\DataBuku;
use App\Models\DataKategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class DataBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku=$buku = DB::table('data_bukus')->get();

        $post=DataBuku::latest();


        return view('buku.index',[
            'data_bukus'=> $buku,

            'post'=>DataBuku::latest()->paginate(4)

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.create',[
            'users'=> User::all(),
            'data_kategoris'=> DataKategori::all()

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
        $tes=$request->validate([
            'judul_buku' => 'required',
            'data_kategori_id' => 'required',
            'book_image' => 'required',
            'nama_pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|integer',
            'jumlah_halaman' => 'required|integer',
            'user_id' => 'required',
            ]);
            if ($request->file('book_image')) {
                $tes['book_image'] = $request->file('book_image')->store('data_bukus', 'public');
            }
            DataBuku::create($tes);
            return redirect('/databuku')
            ->with('success', 'Data Buku Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tes=DataBuku::where('id', $id)->first();
        return view('buku.detail', [
            'data_bukus' => $tes,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tes=DataBuku::where('id', $id)->first();
        return view('buku.edit', [
            'data_bukus' => $tes,
            'users'=> User::all(),
            'data_kategoris'=> DataKategori::all()

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
            'judul_buku' => 'required',
            'data_kategori_id' => 'required',
            'book_image' => 'required',
            'nama_pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|integer',
            'jumlah_halaman' => 'required|integer',
            'user_id' => 'required',
        ];

        $validateData = $request->validate($rules);
        if ($request->file('book_image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['book_image'] = $request->file('book_image')->store('databuku', 'public');
        }

        DataBuku::where('id', $id)->update($validateData);
        return redirect('/databuku')->with('success', 'Buku Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataBuku::destroy($id);
        return redirect('/databuku')->with('success', 'Buku Berhasil Dihapus!');
    }
    
    public function cetak_pdf(){
        $articles = DataBuku::all();
        $pdf = PDF::loadview('buku.printpdf',['data_bukus'=>$articles]);
        return $pdf->stream();
    }
}
