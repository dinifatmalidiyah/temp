@extends('layout.main')
@section('content')
<div class="container mt-3">
    <div class="row justify-content-center align-items-center">
        <div class="card">
            <div class="card-header">Tambah Data Anggota
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
                <form method="post" action="/dataanggota" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" id="image" aria-describedby="Image">
                    </div><br>
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="Nama" ariadescribedby="Nama">
                    </div><br>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat"
                            ariadescribedby="Alamat">
                    </div><br>
                    <div class="form-group">
                        <label for="jeniskelamin">Jenis Kelamin</label>
                        <select class="form-select" aria-label="Default select example" name="jeniskelamin">
                            <option selected value="Perempuan">Perempuan</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                          </select>
                    </div><br>
                    <div class="form-group">
                        <label for="notelp">No Telepon</label>
                        <input type="text" name="notelp" class="form-control" id="notelp" ariadescribedby="Notelp">
                    </div><br>
                    <div class="form-group">
                        <label for="tanggallahir">Tanggal Lahir</label>
                        <input type="date" name="tanggallahir" class="form-control" id="tanggallahir" ariadescribedby="Tanggallahir">
                    </div><br>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-success " href="/dataanggota">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection