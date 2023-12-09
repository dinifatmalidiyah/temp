@extends('layout.main')
@section('title'){{'Data Pelaporan Selesai'}} @endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pelaporan Selesai</h1>
    <p class="mb-4">Berikut Merupakan Data Pelaporan Selesai</p>

    @if(Session::has('berhasil'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success,</strong>
        {{ Session::get('berhasil') }}
    </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row px-3 py-3">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="datatable1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Registrasi</th>
                                    <th>Status</th>
                                    <th>Nama Barang</th>
                                    <th>Lokasi</th>
                                    <th>Tgl. Pelaporan</th>
                                    <th>Selesai Perbaikan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelaporans as $pelaporan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pelaporan->no_registrasi }}</td>
                                        <td><span class="badge bg-success p-2">{{ $pelaporan->status }}</span></td>
                                        <td>{{ $pelaporan->datamesin->nama_mesin }}</td>
                                        <td>{{ $pelaporan->datamesin->workshop->nama_workshop }}</td>
                                        <td>{{ $pelaporan->created_at }}</td>
                                        <td>{{ $pelaporan->updated_at }}</td>
                                        <td>
                                            <a href="/pelaporan/selesai/cetak/{{ $pelaporan->id }}" class="btn btn-primary" target="_blank">Print</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
            </div>
        </div>
        @include('sweetalert::alert')
        @endsection
