@extends('layout.main')
@section('content')
<div class="container mt-3">
    <div class="row justify-content-center align-items-center">
        <div class="card">
            <div class="card-header">Tambah Data Klasifikasi
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="/klasifikasi-mesin" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_workshop">Nama Klasifikasi</label>
                        <input type="text" name="nama_klasifikasi" class="form-control" id="nama_klasifikasi" aria-describedby="nama_worksop">
                    </div><br>
                    <div class="form-group">
                        <label for="keterangan">Kode klasifikasi</label>
                        <input type="text" name="kode_klasifikasi" class="form-control" id="keterangan" ariadescribedby="keterangan">
                    </div><br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-success " href="/data-k">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection