@extends('layouts.app')

@push('datatables')
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@section('title')
    Sales
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.session_messages')
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Sales Data</h3>
                            <a href="{{ route('penjualan.create') }}" class="btn btn-primary btn-sm">Add Sales</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {{-- <div class="table-responsive"> --}}
                            <table class="table table-bordered penjualan-table">
                                <thead>
                                    <tr>
                                        <th width="7%" class="navbar-indigo">No.</th>
                                        <th class="navbar-indigo">Customer</th>
                                        <th class="navbar-indigo">Quantity</th>
                                        <th class="navbar-indigo">Total</th>
                                        <th class="navbar-indigo">Sales Date</th>
                                        <th width="15%" class="navbar-indigo">Action</th>
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
        var penjualanTable = $('.penjualan-table').DataTable({
            processing: true,
            serverSide: true,
            language: {
                sLengthMenu: 'Show _MENU_',
                search: '',
                searchPlaceholder: 'Search'
            },
            ajax: {
                url: '{{ route('penjualan.index') }}',
                type: 'GET'
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'pelanggan',
                    name: 'pelanggan'
                },
                {
                    data: 'kuantitas',
                    name: 'kuantitas'
                },
                {
                    data: 'harga',
                    name: 'harga'
                },
                {
                    data: 'tanggal',
                    name: 'tanggal'
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
