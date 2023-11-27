@extends('layout.main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">@yield('title')</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle user_picture" src="{{ asset('storage/' . $users->foto) }}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center user_name"></h3>
                        <input type="file" name="user_image" id="user_image" style="opacity: 0;height:1px;display:none">
                        <a href="javascript:void(0)" class="btn btn-primary btn-block" id="change_picture_btn"><b>Ganti Foto</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#" data-toggle="tab">Informasi Pribadi</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="post" action="/datapetugas/{{$users->id}}" id="myForm" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" placeholder="Nama Lengkap" name="nama" value="{{ $users->nama }}">
                                    <span class="text-danger error-text name_error"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputNik" placeholder="Masukan NIK" name="nik" value="{{ $users->nik }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Alamat Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Alamat Email" name="email" value="{{ $users->email }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="departemen" class="col-sm-2 col-form-label">Departemen</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="departemen" data-placeholder="Silahkan Pilih" id="single-select-field1">
                                        <option value="" selected disabled>-- Pilih Lokasi Terdaftar --</option>
                                        @foreach ($departemen as $departemen)
                                        <option value="{{ $departemen->nama_departemen }}" @if($users->departemen == $departemen->nama_departemen) selected @endif>{{ $departemen->nama_departemen }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="plant" class="col-sm-2 col-form-label">Plant</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="plant" data-placeholder="Silahkan Pilih" id="single-select-field2">
                                        <option value="" selected disabled>-- Pilih Lokasi Terdaftar --</option>
                                        @foreach ($plant as $dataplant)
                                        <option value="{{ $dataplant->nama_plant }}" @if($users->plant == $dataplant->nama_plant) selected @endif>{{ $dataplant->nama_plant }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPlant" class="col-sm-2 col-form-label">Level</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="level">
                                        <option value="Admin" {{ $users->level == 'Admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="Petugas" {{ $users->level == 'Petugas' ? 'selected' : '' }}>Petugas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a class="btn btn-success" href="/datapetugas">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.col -->
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#single-select-field1').select2();
        $('#single-select-field2').select2();
    });
</script>
@include('sweetalert::alert')
@endsection