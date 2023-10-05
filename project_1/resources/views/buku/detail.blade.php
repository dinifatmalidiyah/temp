@extends('layout.main')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card">
            <div class="card-header">
                Detail Buku
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Id Buku        : </b>{{$data_bukus->id}}</li>
                    <li class="list-group-item"><b>Judul Buku     : </b>{{$data_bukus->judul_buku}}</li>
                    <li class="list-group-item"><b>Id Kategori    : </b>{{$data_bukus->kategoris_id}}</li>
                    <li class="list-group-item"><b>Gambar Buku    : </b><img src="{{ asset('storage/'.$data_bukus ->book_image) }}" alt="" height="150px" width="150px" class="rounded"
                        style="object-fit: cover"></li>
                    <li class="list-group-item"><b>Nama Pengarang : </b>{{$data_bukus->nama_pengarang}}</li>
                    <li class="list-group-item"><b>Penerbit       : </b>{{$data_bukus->penerbit}}</li>
                    <li class="list-group-item"><b>Tahun Terbit   : </b>{{$data_bukus->tahun_terbit}}</li>
                    <li class="list-group-item"><b>Jumlah Halaman : </b>{{$data_bukus->jumlah_halaman}}</li>
                    <li class="list-group-item"><b>Diinput Oleh   : </b>{{$data_bukus->user->nama}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="/databuku">Kembali</a>
        </div>
    </div>
</div>
@endsection