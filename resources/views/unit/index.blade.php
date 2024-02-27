@extends('layouts.app')

@push('datatables')
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@section('title')
    Unit
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.session_messages')
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Unit</h3>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#tambah-unit"
                                class="btn btn-primary btn-sm">Add Unit</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered unit-table">
                            <thead>
                                <tr>
                                    <th width="7%">No.</th>
                                    <th>Name</th>
                                    <th>Abbreviated</th>
                                    <th width="15%">Action</th>
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

    <div class="modal fade" id="tambah-unit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Unit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('unit.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">                
                        <div class="form-group">
                            <label for="name">Name Unit</label>
                            <input type="text" class="form-control" name="nama" id="name"
                                placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                            <label for="singkatan">Abbreviated</label>
                            <input type="text" class="form-control" name="singkatan" id="singkatan"
                                placeholder="Enter Abbreviation" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
              c                      </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="../../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <script>
        var Unit = $('.unit-table').DataTable({
            processing: true,
            serverSide: true,
            language: {
                sLengthMenu: 'Show _MENU_',
                search: '',
                searchPlaceholder: 'Search'
            },
            ajax: {
                url: '{{ route('unit.index') }}',
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
                    data: 'singkatan',
                    name: 'singkatan'
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
