@extends('layouts.app')

@section('title')
    Ubah supplier
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
                        <h3 class="card-title">Ubah supplier</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('supplier.update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" id="nama"
                                            placeholder="Masukkan Nama" value="{{ $supplier->nama }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Alamat Email</label>
                                        <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                            placeholder="Enter email" value="{{ $supplier->email }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_hp">Nomor HP</label>
                                        <input type="text" class="form-control" name="no_hp" id="no_hp"
                                            placeholder="Masukkan Nomor" value="{{ $supplier->no_hp }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" name="alamat" id="alamat"
                                            placeholder="Masukkan Alamat" value="{{ $supplier->alamat }}" required>
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
