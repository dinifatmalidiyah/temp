@extends('layout.main')
@section('title'){{'Kumpulan Buku'}} @endsection
@section('content')                      
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Buku</h1>
        <p class="mb-4">Berikut merupakan data Buku dalam perpustakaan</p>

      @if(Session::has('berhasil'))
          <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Success,</strong>
              {{ Session::get('berhasil') }}
          </div>
      @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
              <a href="/databuku/create" class="btn mb-3 btn-primary btn-icon-split btn-sm">Tambah Data Buku</a>
              <a href="/buku/printpdf" class="btn mb-3 btn-success btn-icon-split btn-sm">Print Data Buku</a>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id Buku</th>
                    <th>Judul Buku</th>
                    <th>Nama Kategori</th>
                    <th>Gambar Buku</th>
                    <th>Nama Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Jumlah Halaman</th>
                    <th>Diinput Oleh</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                  
                  @foreach ($post as $buku)
                  <tr>
                    <td>{{$buku -> id}}</td>
                    <td class="text-capitalize">{{$buku->judul_buku}}</td>
                    <td>{{$buku->data_kategori->nama_kategori}}</td>
                    <td><img src="{{ asset('storage/'.$buku -> book_image) }}" alt="" height="90px" width="90px" class="rounded" style="object-fit: cover"></td>
                    <td>{{$buku->nama_pengarang}}</td>
                    <td>{{$buku->penerbit}}</td>
                    <td>{{$buku->tahun_terbit}}</td>
                    <td>{{$buku->jumlah_halaman}}</td>
                    <td>{{$buku->user->nama}}</td>
                    <td>
                      <a class="btn btn-info" href="/databuku/{{$buku->id}}"><i class="bi bi-eye"></i></a>
                      <a class="btn btn-primary" href="/databuku/{{$buku->id}}/edit"><i class="bi bi-pencil-square"></i></a>
                      <form action="/databuku/{{$buku->id}}" method="POST">@csrf
                        @method('DELETE')
                       <button onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini? ')" class="btn btn-danger"><i class="bi bi-trash"></i></button></form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center">
            {{$post -> links()}}
        </div>
      </div>
      <!-- /.container-fluid -->
</div>
</div>      
@include('sweetalert::alert')  
@endsection