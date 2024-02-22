@extends('layouts.app')

@section('title')
    Edit Product
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('produk.update', $produk->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama">Name:</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ $produk->nama }}" required>
                            </div>
                            <div class="form-group">
                                <label for="sku">SKU:</label>
                                <input type="text" class="form-control" id="sku" name="sku"
                                    value="{{ $produk->sku }}" required>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Category:</label>
                                <input type="text" class="form-control" id="kategori" name="kategori"
                                    value="{{ $produk->kategori->nama }}" required>
                            </div>
                            <div class="form-group">
                                <label for="brand">Brand:</label>
                                <input type="text" class="form-control" id="brand" name="brand"
                                    value="{{ $produk->brand->nama }}" required>
                            </div>
                            <div class="form-group">
                                <label for="unit">Unit:</label>
                                <input type="text" class="form-control" id="unit" name="unit"
                                    value="{{ $produk->unit->nama }}" required>
                            </div>
                            <div class="form-group">
                                <label for="stok">Stock:</label>
                                <input type="number" class="form-control" id="stok" name="stok"
                                    value="{{ $produk->stok }}" required>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="gambar"
                                            id="gambar">
                                        <label class="custom-file-label" for="gambar">Choose Image</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>

                </div>
            </div>
        </div>
    </div>
@endsection
