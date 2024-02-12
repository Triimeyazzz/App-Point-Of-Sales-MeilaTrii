@extends('layouts.app')

@section('title')
    Member
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
                            <h3 class="card-title">Member</h3>
                            <a href="{{ route('members.create') }}" class="btn btn-primary btn-sm">Tambah Member</a>
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
                                    <th width="15%">Kode</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($members as $member)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>
                                            <img src="{{ Storage::url($member->user->photo ?? '../../dist/img/default-150x150.png') }}"
                                                alt="Product 1"
                                                class="img-circle img-size-32 mr-2">{{ $member->user->name }}
                                        </td>
                                        <td>{{ $member->user->email }}</td>
                                        <td>{{ $member->kode }}</td>
                                        <td>
                                            <a href="{{ route('members.edit', $member->id) }}"
                                                class="btn btn-sm btn-primary">Ubah</a>
                                            <button class="btn btn-sm btn-danger"
                                                onclick="if(confirm('Anda Yakin ingin menghapus?')) document.getElementById('delete-form-{{ $member->id }}').submit()">Hapus</button>

                                            <form action="{{ route('members.destroy', $member->id) }}" method="post"
                                                id="delete-form-{{ $member->id }}">
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
                            {{ $members->links() }}
                        </ul>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
