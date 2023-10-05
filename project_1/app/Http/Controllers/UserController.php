<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas=$petugas = DB::table('users')->get();

        $post=User::latest();
        return view('petugas.index',[
            'users'=> $petugas,
            'post'=>User::latest()->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.create',[
            'users'=> User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek=$request->validate([
            'foto' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'password'=>'required',
            'level'=>'required',
            'tanggal_join' => 'required',

            ]);
            if ($request->file('foto')) {
                $cek['foto'] = $request->file('foto')->store('users', 'public');
            }
            User::create($cek);
            return redirect('/datapetugas')
            ->with('success', 'Petugas Berhasil Ditambahkan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cek=User::where('id', $id)->first();
        return view('petugas.detail', [
            'users' => $cek,
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
        $cek=User::where('id', $id)->first();
        return view('petugas.edit', [
            'users' => $cek,
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
            'foto' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'password'=>'required',
            'level'=>'required',
            'tanggal_join' => 'required',
        ];

        $validatedata = $request->validate($rules);
        if ($request->file('foto')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedata['foto'] = $request->file('foto')->store('users', 'public');
        }

        User::where('id', $id)->update($validatedata);


        return redirect('/datapetugas')->with('success', 'Petugas berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/datapetugas')->with('success', 'Petugas berhasil di hapus!');
    }

    public function cetak_pdf(){
        $articles = User::all();
        $pdf = PDF::loadview('petugas.pdf',['users'=>$articles]);
        return $pdf->stream();
    }
}