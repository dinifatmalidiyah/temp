@extends('layout.main')
@section('title'){{'Data Plant'}} @endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Plant </h1>
    <p class="mb-4">Berikut Merupakan Data Plant </p>

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
            <a href="/plant/create" class="btn mb-3 btn-primary btn-icon-split btn-sm">Tambah Data Plant</a>
            <!--
      <a href="/kategori-mesin/printpdf" class="btn mb-3 btn-success btn-icon-split btn-sm">Print Kategori Mesin</a>
      -->

            <div class="row px-3 py-3">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="datatable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nama Plant</th>
                                    <th>Ubah</th>


                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($post as $plant)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$plant->nama_plant}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="/plant/{{$plant->id}}/edit"><i class="bi bi-pencil-square"></i></a>
                                        <div style="display: flex; align-items: center;">
                                            <button type="button" class="btn btn-danger" class="bi bi-trash" data-toggle="modal" data-target="#hapusModal">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>

                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah Anda yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <!-- Form Hapus -->
                                                        <form action="/plant/{{ $plant->id }}" method="POST" style="margin-right: 10px;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        /* Custom styles for all modals */
        .modal {
            background: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            background-color: #007bff;
            color: #ffffff;
            border-bottom: 1px solid #dee2e6;
        }

        .modal-title {
            font-weight: bold;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            border-top: 1px solid #dee2e6;
            padding: 15px;
        }

        .close {
            font-size: 1.5rem;
            font-weight: bold;
            line-height: 1;
            color: #00000;
            opacity: 0.75;
        }

        /* Styling for the buttons in the footer */
        .modal-footer .btn {
            margin-right: 10px;
        }
    </style>
    @include('sweetalert::alert')
    @endsection