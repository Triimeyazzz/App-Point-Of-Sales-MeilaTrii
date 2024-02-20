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
            <style>
                .container {
                    width: 100%;
                    max-width: 1200px;
                    /* Lebar maksimum container */
                    margin: 0 auto;
                    /* Pusatkan container */
                }

                .row {
                    display: flex;
                    flex-wrap: wrap;
                    margin-right: -15px;
                    /* Perbaiki margin kanan */
                    margin-left: -15px;
                    /* Perbaiki margin kiri */
                }

                .col {
                    flex: 1;
                    padding: 0 15px;
                    /* Berikan padding di setiap kolom */
                }
            </style>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center"><strong>Time</strong></div>
                                <div class="d-flex justify-content-between">
                                    <style>
                                        h1,
                                        h2,
                                        p,
                                        a {
                                            font-family: times-new-roman;
                                            font-weight: normal;
                                        }

                                        .jam-digital-trimeyazzz {
                                            overflow: hidden;
                                            width: 340px;
                                            margin: 20px auto;
                                            border: 5px solid #2bc6f5;
                                        }

                                        .kotak {
                                            float: left;
                                            width: 110px;
                                            height: 100px;
                                            background-color: #2700a5;
                                        }

                                        .jam-digital-trimeyazzz p {
                                            color: #fff;
                                            font-size: 36px;
                                            text-align: center;
                                            margin-top: 25px;
                                            text-decoration: none;
                                        }
                                    </style>
                                    <div class="jam-digital-trimeyazzz">
                                        <div class="kotak">
                                            <p id="jam"></p>
                                        </div>
                                        <div class="kotak">
                                            <p id="menit"></p>
                                        </div>
                                        <div class="kotak">
                                            <p id="detik"></p>
                                        </div>
                                    </div>
                                    <script>
                                        window.setTimeout("waktu()", 1000);

                                        function waktu() {
                                            var waktu = new Date();
                                            setTimeout("waktu()", 1000);
                                            document.getElementById("jam").innerHTML = waktu.getHours();
                                            document.getElementById("menit").innerHTML = waktu.getMinutes();
                                            document.getElementById("detik").innerHTML = waktu.getSeconds();
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <style>
                            .kalender-dinamis-trimeyazzz {
                                overflow: hidden;
                                width: 340px;
                                margin: 20px auto;
                                border: 5px solid #2bc6f5;
                            }

                            .kotak {
                                float: left;
                                width: 110px;
                                height: 100px;
                                background-color: #2700a5;
                            }

                            .kalender-dinamis-trimeyazzz p {
                                color: #fff;
                                font-size: 36px;
                                text-align: center;
                                margin-top: 25px;
                                text-decoration: none;
                            }

                            .card {
                                /* gaya kartu */
                                margin-bottom: 20px;
                                border: 1px solid rgba(0, 0, 0, 0.125);
                                border-radius: 0.25rem;
                                background-color: #fff;
                                border-width: 0 0 1px;
                                border-radius: 0;
                            }

                            .card-header {
                                /* gaya header kartu */
                                padding: 0.75rem 1.25rem;
                                margin-bottom: 0;
                                background-color: rgba(0, 0, 0, 0.03);
                                border-bottom: 1px solid rgba(0, 0, 0, 0.125);
                                border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
                            }
                        </style>
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center"><strong>Calendar</strong></div>
                                <div class="d-flex justify-content-between">
                                    <div class="kalender-dinamis-trimeyazzz">
                                        <div class="kotak">
                                            <p id="tanggal"></p>
                                        </div>
                                        <div class="kotak">
                                            <p id="bulan"></p>
                                        </div>
                                        <div class="kotak">
                                            <p id="tahun"></p>
                                        </div>
                                    </div>
                                    <script>
                                        window.onload = function() {
                                            var tanggal = new Date();
                                            document.getElementById("tanggal").innerHTML = tanggal.getDate();
                                            document.getElementById("bulan").innerHTML = tanggal.getMonth() + 1;
                                            document.getElementById("tahun").innerHTML = tanggal.getFullYear();
                                        };
                                    </script>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <section class="content">
                            <div class="container-fluid">
                                <script>
                                    // Fungsi untuk memperbarui nilai CPU traffic
                                    function updateCpuTraffic() {
                                        $.ajax({
                                            url: '/cpu-traffic',
                                            type: 'GET',
                                            success: function(response) {
                                                $('#cpuTraffic').text(response.cpu_traffic);
                                            },
                                            error: function(xhr, status, error) {
                                                console.error(error);
                                            }
                                        });
                                    }
                                
                                    // Panggil fungsi updateCpuTraffic() setiap beberapa detik (misalnya, setiap 5 detik)
                                    setInterval(updateCpuTraffic, 5000); // 5000 milliseconds = 5 seconds
                                </script>
                                
                            <div class="row">
                            <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-cog"></i></span>
                            <div class="info-box-content">
                            <span class="info-box-text">CPU Traffic</span>
                            <span class="info-box-number">
                            10
                            <small>%</small>
                            </span>
                            </div>
                            
                            </div>
                            
                            </div>
                            
                            <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
                            <div class="info-box-content">
                            <span class="info-box-text">Likes</span>
                            <span class="info-box-number">41,410</span>
                            </div>
                            
                            </div>
                            
                            </div>
                            
                            
                            <div class="clearfix hidden-md-up"></div>
                            <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                            <div class="info-box-content">
                            <span class="info-box-text">Sales</span>
                            <span class="info-box-number">760</span>
                            </div>
                            
                            </div>
                            
                            </div>
                            
                            <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                            <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                            <span class="info-box-text">New Members</span>
                            <span class="info-box-number">2,000</span>
                            </div>
                            
                            </div>
                            
                            </div>
                            
                            </div>
                            
                            <div class="row">
                            <div class="col-md-12">
                            <div class="card">
                            <div class="card-header">
                            <h5 class="card-title">Monthly Recap Report</h5>
                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                            <div class="btn-group">
                            <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-wrench"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                            <a href="#" class="dropdown-item">Action</a>
                            <a href="#" class="dropdown-item">Another action</a>
                            <a href="#" class="dropdown-item">Something else here</a>
                            <a class="dropdown-divider"></a>
                            <a href="#" class="dropdown-item">Separated link</a>
                            </div>
                            </div>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                            </button>
                            </div>
                            </div>
                            
                            <div class="card-body">
                            <div class="row">
                            <div class="col-md-8">
                            <p class="text-center">
                            <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                            </p>
                            <div class="chart">
                            
                            <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                            </div>
                            
                            </div>
                            
                            <div class="col-md-4">
                            <p class="text-center">
                            <strong>Goal Completion</strong>
                            </p>
                            <div class="progress-group">
                            Add Products to Cart
                            <span class="float-right"><b>160</b>/200</span>
                            <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" style="width: 80%"></div>
                            </div>
                            </div>
                            
                            <div class="progress-group">
                            Complete Purchase
                            <span class="float-right"><b>310</b>/400</span>
                            <div class="progress progress-sm">
                            <div class="progress-bar bg-danger" style="width: 75%"></div>
                            </div>
                            </div>
                            
                            <div class="progress-group">
                            <span class="progress-text">Visit Premium Page</span>
                            <span class="float-right"><b>480</b>/800</span>
                            <div class="progress progress-sm">
                            <div class="progress-bar bg-success" style="width: 60%"></div>
                            </div>
                            </div>
                            
                            <div class="progress-group">
                            Send Inquiries
                            <span class="float-right"><b>250</b>/500</span>
                            <div class="progress progress-sm">
                            <div class="progress-bar bg-warning" style="width: 50%"></div>
                            </div>
                            </div>
                            
                            </div>
                            
                            </div>
                            
                            </div>
                            
                            <div class="card-footer">
                            <div class="row">
                            <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                            <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                            <h5 class="description-header">$35,210.43</h5>
                            <span class="description-text">TOTAL REVENUE</span>
                            </div>
                            
                            </div>
                            
                            <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                            <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                            <h5 class="description-header">$10,390.90</h5>
                            <span class="description-text">TOTAL COST</span>
                            </div>
                            
                            </div>
                            
                            <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                            <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                            <h5 class="description-header">$24,813.53</h5>
                            <span class="description-text">TOTAL PROFIT</span>
                            </div>
                            
                            </div>
                            
                            <div class="col-sm-3 col-6">
                            <div class="description-block">
                            <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                            <h5 class="description-header">1200</h5>
                            <span class="description-text">GOAL COMPLETIONS</span>
                            </div>
                            
                            </div>
                            </div>
                            
                            </div>
                            
                            </div>
                            
                            </div>
                            
                        </div>
                            
                            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@push('scripts')

<script src="../../../plugins/chart.js/Chart.min.js"></script>
<script src="../../../dist/js/pages/dashboard2.js"></script>
    
@endpush
