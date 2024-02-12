@extends('layouts.app')

@section('title')
    Role
@endsection

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
                        Terjadi error.
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
                            <h3 class="card-title">Role</h3>
                            <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm">Tambah Role</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="7%">No.</th>
                                    <th width="25%">Nama Role</th>
                                    <th>Pengguna</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @foreach ($role->users as $pengguna)
                                                <span class="badge bg-primary">{{ $pengguna->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('roles.edit', $role->id) }}"
                                                class="btn btn-sm btn-primary">Ubah</a>
                                            <a href="javascript:void(0)"
                                                onclick="if(confirm('Anda yakin ingin menghapus data ini?')){ document.getElementById('form-delete-{{ $role->id }}').submit(); }"
                                                class="btn btn-sm btn-danger">Hapus</a>
                                            <form id="form-delete-{{ $role->id }}"
                                                action="{{ route('roles.destroy', $role->id) }}" method="POST">
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
                            {{ $roles->links() }}
                        </ul>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
