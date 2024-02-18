@extends('layouts.app')

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
                        <h3>{{ $users_count }}</h3>

                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More Info<i class="fas fa-arrow-circle-right"></i></a>
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
                        <h3>{{ $users_count }}</h3>

                        <p>Bounce Rate</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More Info<i class="fas fa-arrow-circle-right"></i></a>
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

                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More Info<i class="fas fa-arrow-circle-right"></i></a>
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
                        <h3>{{ $users_count }}</h3>

                        <p>Unique Visitors</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More Info<i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>
            </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection
