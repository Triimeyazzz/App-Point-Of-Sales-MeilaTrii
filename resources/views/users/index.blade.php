@extends('layouts.app')

@section('title')
    Pengguna
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
                            <h3 class="card-title">Pengguna</h3>
                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Tambah Pengguna</a>
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
                                    <th width="10%">Sebagai</th>
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
                                        <td>
                                            <img src="{{ Storage::url($pengguna->photo ?? '../../dist/img/default-150x150.png') }}"
                                                alt="Product 1" class="img-circle img-size-32 mr-2">{{ $pengguna->name }}
                                        </td>
                                        <td>{{ $pengguna->email }}</td>
                                        <td>
                                            @foreach ($pengguna->getRoleNames() as $val)
                                                <span class="badge badge-primary">{{ $val }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('users.edit', $pengguna->id) }}"
                                                class="btn btn-sm btn-primary">Ubah</a>
                                            @if ($pengguna->id != 1)
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="if(confirm('Anda Yakin ingin menghapus?')) document.getElementById('delete-form-{{ $pengguna->id }}').submit()">Hapus</button>

                                                <form action="{{ route('users.destroy', $pengguna->id) }}" method="post"
                                                    id="delete-form-{{ $pengguna->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            @endif
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
@endsection
