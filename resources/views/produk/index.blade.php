@extends('layouts.app')

@push('datatables')
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@section('title')
    Produk
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.session_messages')
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Produk</h3>
                            <a href="{{ route('produk.create') }}" class="btn btn-primary btn-sm">Tambah Produk</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {{-- <div class="table-responsive"> --}}
                            <table class="table table-bordered produk-table">
                                <thead>
                                    <tr>
                                        <th width="7%">No</th>
                                        <th>Nama</th>
                                        <th>SKU</th>
                                        <th>Kategori</th>
                                        <th>Brand</th>
                                        <th>Unit</th>
                                        <th>Stok</th>
                                        <th>Harga Jual</th>
                                        <th>Harga Beli</th>
                                        <th width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        {{-- </div> --}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="../../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <script>
        var produkTable = $('.produk-table').DataTable({
            processing: true,
            serverSide: true,
            language: {
                sLengthMenu: 'Show _MENU_',
                search: '',
                searchPlaceholder: 'Cari'
            },
            ajax: {
                url: '{{ route('produk.index') }}',
                type: 'GET'
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'sku',
                    name: 'sku'
                },
                {
                    data: 'kategori',
                    name: 'kategori'
                },
                {
                    data: 'brand',
                    name: 'brand'
                },
                {
                    data: 'unit',
                    name: 'unit'
                },
                {
                    data: 'stok',
                    name: 'stok'
                },
                {
                    data: 'harga_jual',
                    name: 'harga_jual'
                },
                {
                    data: 'harga_beli',
                    name: 'harga_beli'
                },
                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    </script>
@endpush
