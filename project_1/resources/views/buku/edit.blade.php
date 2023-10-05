@extends('layout.main')
@section('content')
<div class="container mt-3">
    <div class="row justify-content-center align-items-center">
        <div class="card">
            <div class="card-header">
                Edit Data Buku
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
                <form method="post" action="/databuku/{{$data_bukus->id}}" id="myForm"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="form-group">
                        <label for="judul_buku">Judul Buku</label>
                        <input type="text" name="judul_buku" class="form-control" id="nama" value="{{$data_bukus->judul_buku}}"
                            aria-describedby="judul_buku">
                    </div><br>
               <div class="form-group">
                         <label for="image">Nama Kategori</label>
                         <select class="form-select" name="data_kategori_id">
                         @foreach ($data_kategoris as $kategori)
                        <option value="{{ $kategori->id }}" @if($kategori->id==$data_bukus->data_kategori_id) selected @endif>
                         {{ $kategori->nama_kategori }} </option>
                         @endforeach
                         </select>
                    </div><br>

                <div class="form-group">
                        <label for="book_image">Gambar Buku</label>
                        <input type="file" name="book_image" class="form-control" id="book_image" value="{{$data_bukus->book_image}}"
                            aria-describedby="book_image">
                    </div><br>
                <div class="form-group">
                         <label for="nama_pengarang">Nama Pengarang</label>
                        <input type="text" name="nama_pengarang" class="form-control" id="nama_pengarang" value="{{$data_bukus->nama_pengarang}}"
                            aria-describedby="nama_pengarang">
                    </div><br>
                <div class="form-group">
                         <label for="penerbit">Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" id="penerbit" value="{{$data_bukus->penerbit}}"
                            aria-describedby="penerbit">
                    </div><br>
                <div class="form-group">
                         <label for="tahun_terbit">Tahun Terbit</label>
                        <input type="text" name="tahun_terbit" class="form-control" id="tahun_terbit" value="{{$data_bukus->tahun_terbit}}"
                            aria-describedby="tahun_terbit">
                    </div> <br>   
                <div class="form-group">
                         <label for="jumlah_halaman">Jumlah Halaman</label>
                        <input type="text" name="jumlah_halaman" class="form-control" id="jumlah_halaman" value="{{$data_bukus->jumlah_halaman}}"
                            aria-describedby="jumlah_halaman">
                    </div> <br>   
                  <div class="form-group">
                        <label for="deskripsi">Diinput Oleh</label>
                        <select class="form-select" name="user_id">
                         @foreach ($users as $user)

                         <option value="{{ $user->id }}" {{ $data_bukus->user_id == $user->id ? 'selected' : '' }}>
                         {{ $user->nama }} </option>
                         @endforeach
                         </select>
                    </div> <br>
                    
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-success " href="/databuku">Kembali</a>
            </form>
        </div>
    </div>
</div>
</div>
@endsection