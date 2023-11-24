@extends('layout.main')
@section('title'){{'Data Petugas'}} @endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  @if(auth()->user()->level=='Admin')
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Petugas</h1>
  <p class="mb-4">Berikut merupakan data Petugas perpustakaan</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <a href="/datapetugas/create" class="btn mb-3 btn-primary btn-icon-split btn-sm">Tambah Data Petugas</a>
      <a href="/petugas/pdf" class="btn mb-3 btn-success btn-icon-split btn-sm">Print Data Petugas</a>
      </a>
      <div class="row px-3 py-3">
        <div class="col-lg-12">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="datatable">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Foto</th>
                  <th>Nama Lengkap</th>
                  <th>NIK</th>
                  <th>Email</th>
                  <th>Departemen</th>
                  <th>Plant</th>
                  <th>Tanggal Aktif</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($post as $user)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td><img src="{{ asset('storage/'.$user -> foto) }}" alt="" height="50px" width="50px" class="rounded" style="object-fit: cover"></td>
                  <td class="text-capitalize">{{$user->nama}}</td>
                  <td>{{ $user->nik }}</td>
                  <td>{{ $user->departemen }}</td>
                  <td>{{ $user->plant }}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->tanggal_join}}</td>
                  <td style="text-align:left;">
                    <a class="btn btn-primary" href="/datapetugas/{{$user->nama}}/edit"><i class="bi bi-pencil-square"></i></a>
                    <form action="/datapetugas/{{$user->id}}" method="POST">@csrf
                      @method('DELETE')
                      <button onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini? ')" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </form>
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
  @else

  <div class="container access-denied">
    <div class="row justify-content-center align-items-center" style="height: 80vh;">
      <div class="col-md-6 text-center">
        <p class="text-danger h2">Tidak ada akses</p>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <style>
    /* Style for the table */
    .table.table-bordered thead th {
      text-align: center;
      vertical-align: middle;
      white-space: nowrap;
    }

    .table.table-bordered tbody td {
      text-align: center;
      vertical-align: middle;
      white-space: nowrap;
    }

    /* Adjust column widths */
    .table.table-bordered th:nth-child(1),
    .table.table-bordered td:nth-child(1) {
      width: 10%;
    }

    .table.table-bordered th:nth-child(2),
    .table.table-bordered td:nth-child(2) {
      width: 10%;
    }

    .table.table-bordered th:nth-child(3),
    .table.table-bordered td:nth-child(3) {
      width: 15%;
    }

    .table.table-bordered th:nth-child(4),
    .table.table-bordered td:nth-child(4) {
      width: 8%;
    }

    .table.table-bordered th:nth-child(5),
    .table.table-bordered td:nth-child(5) {
      width: 10%;
    }

    .table.table-bordered th:nth-child(6),
    .table.table-bordered td:nth-child(6) {
      width: 12%;
    }

    .table.table-bordered th:nth-child(7),
    .table.table-bordered td:nth-child(7) {
      width: 10%;
    }

    .table.table-bordered th:nth-child(8),
    .table.table-bordered td:nth-child(8) {
      width: 5%;
    }

    .table.table-bordered th:nth-child(9),
    .table.table-bordered td:nth-child(9) {
      width: 5%;
    }

    .table.table-bordered th:nth-child(10),
    .table.table-bordered td:nth-child(10) {
      width: 10%;
    }
  </style>
  @endif
  @include('sweetalert::alert')
  <!-- End of Main Content -->
  @endsection