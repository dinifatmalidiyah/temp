@extends('layout.main')
@section('title'){{'Permintaan'}} @endsection
@section('content')
<h1 class="h3 mb-2 text-gray-800">Daftar Permintaan Perbaikan</h1>
<p class="mb-4">Berikut Merupakan Daftar Permintaan Perbaikan</p>
<div class="table-responsive">
    <table class="table table-bordered table-hover" id="datatable">
        <thead>
            <tr>
                <th style="width: 5%;">Ubah</th>
                <th style="width: 5%;">No.</th>
                <th style="width: 10%;">No.Registrasi</th>
                <th style="width: 10%;">Kategori Mesin</th>
                <th style="width: 10%;">Klasifikasi Mesin</th>
                <th style="width: 15%;">Nama Mesin</th>
                <th style="width: 5%;">Type</th>
                <th style="width: 10%;">Merk</th>
                <th style="width: 15%;">Spesifikasi</th>
                <th style="width: 10%;">Pabrikan</th>
                <th style="width: 5%;">Kapasitas</th>
                <th style="width: 5%;">Tahun Mesin</th>
                <th style="width: 10%;">Lokasi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Isi tabel -->
        </tbody>
    </table>
</div>
@endsection