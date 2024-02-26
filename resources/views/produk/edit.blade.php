@extends('layouts.app')

@section('title')
    Product
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
                        <h3 class="card-title">Edit Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Product Name</label>
                                        <input type="text" class="form-control" name="nama" id="nama"
                                            placeholder="Enter Name" value="{{ $produk->nama }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kategori_id">Category</label>
                                        <select name="kategori_id" id="kategori_id" class="form-control" required>
                                            <option value="">Choose Category</option>
                                            @foreach ($kategoris as $kategori)
                                                <option value="{{ $kategori->id }}"
                                                    {{ $produk->kategori_id == $kategori->id ? 'selected' : '' }}>
                                                    {{ $kategori->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="brand_id">Brand</label>
                                        <select name="brand_id" id="brand_id" class="form-control" required>
                                            <option value="">Choose Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    {{ $produk->brand_id == $brand->id ? 'selected' : '' }}>
                                                    {{ $brand->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="unit_id">Unit</label>
                                        <select name="unit_id" id="unit_id" class="form-control" required>
                                            <option value="">Choose Unit</option>
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}"
                                                    {{ $produk->unit_id == $unit->id ? 'selected' : '' }}>
                                                    {{ $unit->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sku">SKU</label>
                                        <input type="text" class="form-control" name="sku" id="sku"
                                            placeholder="Enter SKU" value="{{ $produk->sku }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_beli">Selling Price</label>
                                        <input type="number" class="form-control" name="harga_beli" id="harga_beli"
                                            placeholder="Enter Price" value="{{ $produk->harga_beli }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_jual">Purchase Price</label>
                                        <input type="number" class="form-control" name="harga_jual" id="harga_jual"
                                            placeholder="Enter Price" value="{{ $produk->harga_jual }}" required>
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="deskripsi">Description</label>
                                        <textarea class="form-control" name="deskripsi" rows="3" id="deskripsi" placeholder="Enter Descripption">{{ $produk->deskripsi }}</textarea>
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
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
