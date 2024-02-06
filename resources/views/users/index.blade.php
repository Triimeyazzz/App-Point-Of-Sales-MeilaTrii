@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        There were some errors with your request.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Pengguna</h3>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah-pengguna">Tambah
                                Pengguna</button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="7%">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th width="10%">Role</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($users as $pengguna)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $pengguna->name }}</td>
                                        <td>{{ $pengguna->email }}</td>
                                        <td>
                                            @foreach ($pengguna->getRoleNames() as $val)
                                                <span class="badge badge-primary">{{ $val }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-primary">Ubah</button>
                                            <button class="btn btn-sm btn-danger"
                                                onclick="if(confirm('Anda Yakin ingin menghapus?')) document.getElementById('delete-form-{{ $pengguna->id }}').submit()">Hapus</button>

                                            <form action="{{ route('users.destroy', $pengguna->id) }}" method="post"
                                                id="delete-form-{{ $pengguna->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            {{ $users->links() }}
                        </ul>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambah-pengguna">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pengguna</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Masukkan Nama" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                    placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                                    placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword2">Konfirmasi Password</label>
                                <input type="password" class="form-control" name="confirm-password"
                                    id="exampleInputPassword2" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Role</label>
                                <select class="form-control" name="roles[]" required>
                                    <option value="">Pilih Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleInputFile">Photo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <!-- /.card-body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
