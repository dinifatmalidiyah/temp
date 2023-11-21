@extends('layout.main')
@section('title'){{ 'Data Klasifikasi' }}@endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Klasifikasi</h1>
    <p class="mb-4">Berikut Merupakan Data Klasifikasi</p>

    @if(Session::has('berhasil'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success:</strong> {{ Session::get('berhasil') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <a href="klasifikasi-mesin/create" class="btn btn-primary btn-sm mb-3"><i class="bi bi-plus"></i> Tambah Data Kategori</a>

            <div class="row px-3 py-3">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="datatable">
                            <thead>
                                <tr>
                                    <th>Nama Klasifikasi</th>
                                    <th>Kode Klasifikasi</th>
                                    <th>Ubah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($post as $kategori)
                                <tr>
                                    <td>{{ $kategori->nama_klasifikasi }}</td>
                                    <td>{{ $kategori->kode_klasifikasi }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="klasifikasi-mesin/{{$kategori->id}}/edit"><i class="bi bi-pencil-square"></i></a>
                                        <form action="/klasifikasi-mesin/{{$kategori->id}}" method="POST">@csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini? ')" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
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
                {{ $post->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            "order": [
                [1, 'asc']
            ], // Mengurutkan kolom No.Registrasi secara default
            "searching": true // Mengaktifkan pencarian
        });
    });
</script>

@include('sweetalert::alert')
@endsection