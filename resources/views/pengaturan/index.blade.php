@extends('layouts.app')

@section('title')
    Settings
@endsection

@section('content')
    <div class="container-fluid">
        @include('layouts.session_messages')
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route('pengaturan.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label for="nama_perusahaan" class="col-sm-2 col-form-label">Company Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan"
                                value="{{ $pengaturan['nama_perusahaan'] }}" placeholder="Enter Company Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Company Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="alamat" id="alamat"
                                value="{{ $pengaturan['alamat'] }}" placeholder="Enter Company Address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telepon" class="col-sm-2 col-form-label">Telephone</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="telepon" id="telepon"
                                value="{{ $pengaturan['telepon'] }}" placeholder="Enter Telephone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="logo">Logo</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="logo" id="logo">
                                    <label class="custom-file-label" for="logo">Choose Image</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="favicon">Favicon</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="favicon" id="favicon">
                                    <label class="custom-file-label" for="favicon">Choose Image</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
