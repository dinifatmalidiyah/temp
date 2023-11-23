@extends('layout.main')
@section('title'){{'Data Kategori Mesin'}} @endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Kategori</h1>
    <p class="mb-4">Berikut Merupakan Data Kategori</p>

    @if(Session::has('berhasil'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success,</strong>
        {{ Session::get('berhasil') }}
    </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-body">
            <a href="/kategori-mesin/create" class="btn mb-3 btn-primary btn-icon-split btn-sm">Tambah Data</a>
            <!--
      <a href="/kategori-mesin/printpdf" class="btn mb-3 btn-success btn-icon-split btn-sm">Print Kategori Mesin</a>
      -->
            <div class="row px-3 py-3">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="datatable1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama kategori</th>
                                    <th>Kode kategori</th>
                                    <th>Ubah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($post as $kategori)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$kategori->nama_kategori}}</td>
                                    <td>{{$kategori->kode_kategori}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="/kategori-mesin/{{$kategori->id}}/edit"><i class="bi bi-pencil-square"></i></a>
                                        <form action="/kategori-mesin/{{$kategori->id}}" method="POST">@csrf
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
                {{$post->links()}}
            </div>
        </div>
        @include('sweetalert::alert')
        @endsection