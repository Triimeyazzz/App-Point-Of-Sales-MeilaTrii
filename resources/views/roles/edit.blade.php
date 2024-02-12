@extends('layouts.app')

@section('title')
    Tambah Role
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Role</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('roles.update', $role->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama Role</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Masukkan Nama" value="{{ $role->name }}" required>
                            </div>
                            {{-- <div class="form-group">
                                <label for="nama_role">Pilih Perizinan <span class="text-danger">*</span></label>
                                @foreach ($permission as $value)
                                    <div class="form-check form-check">
                                        <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                                            {{ $value->nama }}</label>
                                    </div>
                                @endforeach
                            </div> --}}
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
