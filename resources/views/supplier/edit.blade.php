@extends('layouts.app')

@section('title')
    Suppliers
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
                        <h3 class="card-title">Change Supplier</h3>
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
                                        <label for="nama">Suppliers Name</label>
                                        <input type="text" class="form-control" name="nama" id="nama"
                                            placeholder="Enter Name" value="{{ $supplier->nama }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                            placeholder="Enter email" value="{{ $supplier->email }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_hp">Phone Number</label>
                                        <input type="number" class="form-control" name="no_hp" id="no_hp"
                                            placeholder="Enter Phone Number" value="{{ $supplier->no_hp }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Address</label>
                                        <input type="text" class="form-control" name="alamat" id="alamat"
                                            placeholder="Enter Address" value="{{ $supplier->alamat }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-blue">Save</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
