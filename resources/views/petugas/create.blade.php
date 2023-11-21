@extends('layout.main')
@section('content')
<div class="container mt-3">
    <div class="row justify-content-center align-items-center">
        <div class="card">
            <div class="card-header">Tambah Data Petugas
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
                <form method="post" action="/datapetugas" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <!--
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control" id="foto" aria-describedby="foto">
                    </div><br>
                    -->
                    <div class="form-group">
                        <label for="Nama">NIK</label>
                        <input type="text" name="nik" class="form-control" id="nik" ariadescribedby="Nama">
                    </div><br>
                    <div class="form-group">
                        <label for="Nama">Nama Petugas</label>
                        <input type="text" name="nama" class="form-control" id="Nama" ariadescribedby="Nama">
                    </div><br>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" ariadescribedby="email">
                    </div><br>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" ariadescribedby="password">
                    </div><br>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select class="form-select" aria-label="Default select example" name="level">
                            <option selected value="petugas">Petugas</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label for="tanggal_join">Tanggal Join</label>
                        <input type="date" name="tanggal_join" class="form-control" id="tanggal_join" ariadescribedby="tanggal_join">
                    </div><br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-success " href="/datapetugas">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection