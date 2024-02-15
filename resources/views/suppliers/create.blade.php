@extends('layouts.app')

@section('title')
    Tambah Supplier
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                @include('layouts.session_messages')
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Subplier</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('suppliers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nama Supplier</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Masukkan Nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Alamat Email</label>
                                        <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                            placeholder="Enter email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" name="password"
                                            id="exampleInputPassword1" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword2">Konfirmasi Password</label>
                                        <input type="password" class="form-control" name="confirm-password"
                                            id="exampleInputPassword2" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_hp">Nomor HP</label>
                                        <input type="text" class="form-control" name="no_hp" id="no_hp"
                                            placeholder="Masukkan Nomor" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" name="alamat" id="alamat"
                                            placeholder="Masukkan Alamat" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="userphoto">Photo/Logo</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="photo" class="custom-file-input"
                                                    id="userphoto" accept="image/*">
                                                <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
