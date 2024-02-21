@extends('layouts.app')

@push('styles')
    <style>

    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- small box -->
            <div class="col-lg-3 col-6">
                <style>
                    .warnabox1 {
                        background: rgb(255, 47, 82);
                    }
                </style>
                <!-- small box -->
                <div class="warnabox1">
                    <div class="small-box">
                        <div class="inner">
                            <h3>{{ $product_count }}</h3>

                            <p>Product</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-box-open"></i>
                        </div>
                        <a href="{{ route('produk.index') }}" class="small-box-footer">More Info<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <style>
                    .warnabox2 {
                        background: rgb(255, 103, 129);
                    }
                </style>
                <!-- small box -->
                <div class="warnabox2">
                    <div class="small-box">
                        <div class="inner">
                            <h3>{{ $supplier_count }}</h3>

                            <p>Supplier</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <a href="{{ route('supplier.index') }}" class="small-box-footer">More Info<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- small box -->
            <div class="col-lg-3 col-6">
                <style>
                    .warnabox3 {
                        background: #ff8c9f;
                    }
                </style>
                <!-- small box -->
                <div class="warnabox3">
                    <div class="small-box">
                        <div class="inner">
                            <h3>{{ $users_count }}</h3>

                            <p>User</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('users.index') }}" class="small-box-footer">More Info<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <style>
                    .warnabox4 {
                        background: rgb(255, 213, 220);
                    }
                </style>
                <!-- small box -->
                <div class="warnabox4">
                    <div class="small-box">
                        <div class="inner">
                            <h3>{{ $pelanggan_count }}</h3>

                            <p>Customer</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('pelanggan.index') }}" class="small-box-footer">More Info<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
    </div>
@endsection

@push('scripts')

<script src="../../../plugins/chart.js/Chart.min.js"></script>
<script src="../../../dist/js/pages/dashboard2.js"></script>
    
@endpush
