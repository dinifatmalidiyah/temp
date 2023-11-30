@extends('layout.main')
@section('title'){{'Buat Analisis'}} @endsection
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h2>Form Analisis</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="/data-mesin" id="myForm" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Teknisi yang Memperbaiki:<span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama Mesin" value="{{ auth()->user()->nama }}" readonly>
                            @error('nama_mesin')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_minta" class="form-label">Waktu Tanggal Jam<span class="text-danger">*</span></label>
                            <input type="date" name="kapasitas" class="form-control" id="tanggal" placeholder="Masukan Tanggal Permintaan" value="{{ old('kapasitas') }}">
                            @error('tanggal_minta')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama_mesin" class="form-label">Analisa Penyebab Kerusakan<span class="text-danger">*</span></label>
                            <textarea type="text" name="nama_mesin" class="form-control" id="nama_mesin" placeholder="Masukkan Nama Mesin" value="{{ old('nama_mesin') }}" rows="4" required></textarea>
                            @error('nama_mesin')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama_mesin" class="form-label">Tindakan Perbaikan<span class="text-danger">*</span></label>
                            <input type="text" name="nama_mesin" class="form-control" id="nama_mesin" placeholder="Masukkan Nama Mesin" value="{{ old('nama_mesin') }}" required>
                            @error('nama_mesin')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama_mesin" class="form-label">saran-saran Tindakkan Untuk pencegahan agar tidak terjadi Rusak kembali<span class="text-danger">*</span></label>
                            <textarea type="text" name="nama_mesin" class="form-control" id="nama_mesin" placeholder="Masukkan Nama Mesin" value="{{ old('nama_mesin') }}" rows="4" required></textarea>
                            @error('nama_mesin')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama_mesin" class="form-label">Uraian kerusakan<span class="text-danger">*</span></label>
                            <input type="text" name="nama_mesin" class="form-control" id="nama_mesin" placeholder="Masukkan Nama Mesin" value="{{ old('nama_mesin') }}" required>
                            @error('nama_mesin')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                            <a class="btn btn-success" href="#">Kembali</a>
                        </div>
                    </form>
                </div>
                @endsection