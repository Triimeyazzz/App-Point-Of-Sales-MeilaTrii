<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice Print</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <img src="../../dist/img/credit/5a.jpeg" width="3%"
                            class="brand-image img-circle elevation-3" style="opacity: .8"> Point Of Sales
                        <small class="float-right">Date: {{ now()->format('d-m-Y') }}</small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <address>
                        {{-- kita ambil datanya dari penjualan --}}
                        <strong>Sales Invoice</strong><br><br>
                        <b>Payment Due:</b> {{ $penjualan->created_at->format('d-m-Y') }}<br>
                        <b>Customer:</b> {{ $penjualan->pelanggan->nama }}<br>
                        <b>Account:</b> {{ $penjualan->pelanggan->no_hp }}<br>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                </div>
                <!-- / "terserah"-->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="navbar-indigo">No.</th>
                                <th class="navbar-indigo">Customer</th>
                                <th class="navbar-indigo">Quantity</th>
                                <th class="navbar-indigo">Total</th>
                                <th class="navbar-indigo">Sales Date</th>
                                <th class="navbar-indigo">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($details as $detail)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $detail->produk->nama }}</td>
                                    <td>{{ $detail->kuantitas }}</td>
                                    <td>Rp. {{ number_format($detail->harga, 0, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($detail->harga * $detail->kuantitas, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                    <p class="lead">Payment Methods:</p>
                    <img src="../../dist/img/credit/visa.png" alt="Visa">
                    <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                    <img src="../../dist/img/credit/american-express.png" alt="American Express">
                    <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango
                        imeem plugg dopplr
                        jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                    </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <p class="lead">Amount Due 2/22/2014</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Total:</th>
                                <td>Rp. {{ number_format($penjualan->harga, 0, ',', '.') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>
