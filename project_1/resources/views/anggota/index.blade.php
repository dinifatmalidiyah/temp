@extends('layout.main')
@section('title'){{'Data Anggota'}} @endsection
@section('content')                      
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Anggota</h1>
        <p class="mb-4">Berikut merupakan data anggota perpustakaan</p>

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
               <a href="/dataanggota/create" class="btn mb-3 btn-primary btn-icon-split btn-sm">Tambah Data Anggota</a>
               <a href="/anggota/pdf" class="btn mb-3 btn-success btn-icon-split btn-sm">Print Data Anggota</a>
            <div class="table-responsive">
              <table class="table table-bordered" style="text-align:center;" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Nama User</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telepon</th>
                    <th>Tanggal Lahir</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                  
                  @foreach ($post as $anggota)
                  <tr>
                    <td>{{$anggota->id}}</td>
                    <td><img src="
                    @if($anggota -> jeniskelamin == 'Perempuan')
                      {{asset('image/student-female.png')}}
                      @else 
                      {{asset('image/student-male.png')}}
                      @endif
                      " alt="" width="50px"></td>
                    <td class="text-capitalize">{{$anggota->nama}}</td>
                    <td>{{$anggota->alamat}}</td>
                    <td>{{$anggota->jeniskelamin}}</td>
                    <td>{{$anggota->notelp}}</td>
                    <td>{{$anggota->tanggallahir}}</td>
                    <td style="text-align:left;">
                        <a class="btn btn-info" href="/dataanggota/{{$anggota->id}}"><i class="bi bi-eye"></i></a>
                      <a class="btn btn-primary" href="/dataanggota/{{$anggota->id}}/edit"><i class="bi bi-pencil-square"></i></a>
                      <form action="/dataanggota/{{$anggota->id}}" method="POST">@csrf
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
@endsection