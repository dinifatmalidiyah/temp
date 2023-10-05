@extends('layout.main')
@section('title'){{'Data Petugas'}} @endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Petugas</h1>
    <p class="mb-4">Berikut merupakan data Petugas perpustakaan</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <a href="/datapetugas/create" class="btn mb-3 btn-primary btn-icon-split btn-sm">Tambah Data Petugas</a>
        <a href="/petugas/pdf" class="btn mb-3 btn-success btn-icon-split btn-sm">Print Data Petugas</a>
      </a>
        <div class="table-responsive">
          <table class="table table-bordered" style="text-align:center;" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Id</th>
                <th>Foto</th>
                <th>Nama Petugas</th>
                <th>Email</th>
                <th>Bergabung Pada</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             
              @foreach ($post as $user)
              <tr>
              <td>{{$user->id}}</td>
              <td><img src="{{ asset('storage/'.$user -> foto) }}" alt="" height="50px" width="50px" class="rounded"
                style="object-fit: cover"></td>
              <td class="text-capitalize">{{$user->nama}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->tanggal_join}}</td>
              <td style="text-align:left;">
                <a class="btn btn-primary" href="/datapetugas/{{$user->id}}/edit"><i class="bi bi-pencil-square"></i></a>
                <form action="/datapetugas/{{$user->id}}" method="POST">@csrf
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
@include('sweetalert::alert') 
<!-- End of Main Content -->
@endsection
