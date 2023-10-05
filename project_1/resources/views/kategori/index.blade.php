@extends('layout.main')
@section('title'){{'Kategori Buku'}} @endsection
@section('content')                      
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Kategori Buku</h1>
        <p class="mb-4">Berikut Merupakan Data Kategori Dalam Perpustakaan</p>

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
               <a href="/datakategori/create" class="btn mb-3 btn-primary btn-icon-split btn-sm">Tambah Data Kategori</a>
               <a href="/kategori/printpdf" class="btn mb-3 btn-success btn-icon-split btn-sm">Print Kategori Buku</a>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Foto Kategori</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
                    

                  </tr>
                </thead>
                <tbody>
                  
                  @foreach ($post as $kategori)
                  <tr>
                    <td>{{$kategori -> id}}</td>
                    <td>{{$kategori->nama_kategori}}</td>
                    <td><img src="{{ asset('storage/'.$kategori -> image) }}" alt="" height="80px" width="80px" class="rounded"style="object-fit: cover"></td>
                    <td>{{$kategori->deskripsi}}</td>
                    <td>
                      <a class="btn btn-primary" href="/datakategori/{{$kategori->id}}/edit"><i class="bi bi-pencil-square"></i></a>
                      <form action="/datakategori/{{$kategori->id}}" method="POST">@csrf
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
            {{$post->links()}}
        </div>
      </div>
      <!-- /.container-fluid -->
</div>      
@include('sweetalert::alert')  
@endsection