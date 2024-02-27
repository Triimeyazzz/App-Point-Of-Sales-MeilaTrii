@extends('layouts.app')

@push('styles')
    <style>
.body {
background: rgb(238,174,202);
background: radial-gradient(circle, rgba(238,174,202,1) 0%, #94bbe9 100%);
}
    </style>
@endpush
<div class="body">
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-box-open"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Products</span>
                        <span class="info-box-number">{{ $product_count }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-lightblue"><i class="far fa-flag"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Categories</span>
                        <span class="info-box-number">{{ $kategori_count }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-purple"><i class="far fa-copy"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Brands</span>
                        <span class="info-box-number">{{ $brand_count }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    @role('Admin')
                        <span class="info-box-icon bg-indigo"><i class="far fa-money-bill-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Profit</span>
                            <span class="info-box-number">Rp. {{ $profit }}</span>
                        </div>
                    @else
                        <span class="info-box-icon bg-navy"><i class="fa fa-box"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Unit</span>
                            <span class="info-box-number">{{ $unit_count }}</span>
                        </div>
                    @endrole
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
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
                            <h3>{{ $pelanggan_count }}</h3>

                            <p>Customers</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('pelanggan.index') }}" class="small-box-footer">More Info<i
                                class="fas fa-arrow-circle-right"></i></a>
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

                            <p>Suppliers</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <a href="{{ route('supplier.index') }}" class="small-box-footer">More Info<i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- small box -->
            <div class="col-lg-3 col-6">
                <style>
                    .warnabox3 {
                        background: hsl(350, 100%, 77%);
                    }
                </style>
                <!-- small box -->
                <div class="warnabox3">
                    <div class="small-box">
                        <div class="inner">
                            <h3>{{ $pembelian_count }}</h3>

                            <p>Purchases</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cart-arrow-down"></i>
                        </div>
                        <a href="{{ route('pembelian.index') }}" class="small-box-footer">More Info<i
                                class="fas fa-arrow-circle-right"></i></a>
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
                            <h3>{{ $penjualan_count }}</h3>

                            <p>Sales</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <a href="{{ route('penjualan.index') }}" class="small-box-footer">More Info<i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- /.col (LEFT) -->
            <div class="col-md-8">
                <!-- LINE CHART -->
                <!-- BAR CHART -->
                <div class="card card-indigo">
                    <div class="card-header">
                        <h3 class="card-title">PURCHASE & SALES BAR CHART</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-4">
                <div class="card card-lightblue">
                    <div class="card-header">
                        <h3 class="card-title">RECENTLY ADDED ITEMS</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Sales Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($recentProducts as $recentProduct)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $recentProduct->nama }}</td>
                                        <td>Rp. {{ number_format($recentProduct->harga_jual, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.col (RIGHT) -->
            </div>
        </div>
    </div>

@endsection
</div>
@push('scripts')
    <script src="../../../plugins/chart.js/Chart.min.js"></script>
    <script src="../../../dist/js/pages/dashboard2.js"></script>

    <script>
        var totalPenjualanPerBulan = @json($totalPenjualanPerBulan);
        var totalPembelianPerBulan = @json($totalPembelianPerBulan);

        var areaChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
                'November', 'December'
            ],
            datasets: [{
                    label: 'Sales',
                    backgroundColor: 'rgb(255, 213, 220)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: totalPenjualanPerBulan
                },
                {
                    label: 'Purchase',
                    backgroundColor: 'hsl(350, 100%, 77%)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: totalPembelianPerBulan
                },
            ]
        }
        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        var temp1 = areaChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }

        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })
    </script>
@endpush
