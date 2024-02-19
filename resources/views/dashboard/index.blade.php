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
    <style>
        .container {
  width: 100%;
  max-width: 1200px; /* Lebar maksimum container */
  margin: 0 auto; /* Pusatkan container */
}

.row {
  display: flex;
  flex-wrap: wrap;
  margin-right: -15px; /* Perbaiki margin kanan */
  margin-left: -15px; /* Perbaiki margin kiri */
}

.col {
  flex: 1;
  padding: 0 15px; /* Berikan padding di setiap kolom */
}

    </style>
                <div class="container">
                    <div class="row">
                      <div class="col">
                        <div class="card">
                            <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <style>
                                    h1,h2,p,a{
                                        font-family: times-new-roman;
                                        font-weight: normal;
                                    }

                                    .jam-digital-trimeyazzz {
                                        overflow: hidden;
                                        width: 340px;
                                        margin: 20px auto;
                                        border: 5px solid #2bc6f5;
                                    }
                                    .kotak{
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
                                <div class="text-center font-bold"><strong>Calendar</strong></div>
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
                                        window.onload = function () {
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
                        1 of 2
                      </div>
                      <div class="col">
                        2 of 3
                      </div>
                      <div class="col">
                        3 of 3
                      </div>
                    </div>
                  </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection
