@extends('layouts.app')

@push('datatables')
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@section('title')
    Purchase Report
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.session_messages')
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Purchase Report</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {{-- <div class="table-responsive"> --}}
                        <table class="table table-bordered purchase-report-table">
                            <thead>
                                <tr>
                                    <th width="7%" class="navbar-purple">No.</th>
                                    <th class="navbar-purple">Suppliers</th>
                                    <th class="navbar-purple">Quantity</th>
                                    <th class="navbar-purple">Total</th>
                                    <th class="navbar-purple">Purchase Date</th>
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
        var purchaseReportTable = $('.purchase-report-table').DataTable({
            processing: true,
            serverSide: true,
            language: {
                sLengthMenu: 'Show _MENU_',
                search: '',
                searchPlaceholder: 'Search'
            },
            ajax: {
                url: '{{ route('purchase.report') }}',
                type: 'GET'
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'supplier',
                    name: 'supplier'
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
            ]
        });
    </script>
@endpush
