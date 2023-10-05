@extends('layout.main')
@section('content')
<div class="container mt-3">
    <div class="row justify-content-center align-items-center">
        <div class="card">
            <div class="card-header">
                Edit Anggota
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
                <form method="post" action="/dataanggota/{{$data_anggotas->id}}" id="myForm"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" id="image" ariadescribedby="image"
                            value="{{ $data_anggotas -> image }}">
                        <img width="150px" src="{{asset('storage/'.$data_anggotas -> image)}}"
                            alt="{{ $data_anggotas -> image }}">
                    </div><br>
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="Nama" value="{{ $data_anggotas->nama }}"
                            aria-describedby="Nama">
                    </div><br>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $data_anggotas->alamat }}"
                            aria-describedby="alamat">
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
                        <input type="text" name="notelp" class="form-control" id="notelp" value="{{ $data_anggotas->notelp }}"
                            aria-describedby="Notelp">
                    </div><br>
                    <div class="form-group">
                        <label for="tanggallahir">Tanggal Lahir</label>
                        <input type="date" name="tanggallahir" class="form-control" id="tanggallahir" value="{{ $data_anggotas->tanggallahir }}"
                            aria-describedby="Tanggallahir">
                    </div><br>
                    
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-success " href="/dataanggota">Kembali</a>
            </form>
        </div>
    </div>
</div>
</div>
@endsection