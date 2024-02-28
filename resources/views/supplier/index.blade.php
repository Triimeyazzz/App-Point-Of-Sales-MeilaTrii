@extends('layouts.app')

@push('datatables')
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@section('title')
    Suppliers
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.session_messages')
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Suppliers Data</h3>
                            <a href="{{ route('supplier.create') }}" class="btn btn-primary btn-sm">Add Suppliers</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered supplier-table">
                            <thead>
                                <tr>
                                    <th width="7%" class="navbar-indigo">No.</th>
                                    <th class="navbar-indigo">Suppliers Name</th>
                                    <th class="navbar-indigo">Email</th>
                                    <th width="20%" class="navbar-indigo">Phone Number</th>
                                    <th class="navbar-indigo">Address</th>
                                    <th width="15%" class="navbar-indigo">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
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
        var supplierTable = $('.supplier-table').DataTable({
            processing: true,
            serverSide: true,
            language: {
                sLengthMenu: 'Show _MENU_',
                search: '',
                searchPlaceholder: 'Search'
            },
            ajax: {
                url: '{{ route('supplier.index') }}',
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
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'no_hp',
                    name: 'no_hp'
                },
                {
                    data: 'alamat',
                    name: 'alamat'
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
