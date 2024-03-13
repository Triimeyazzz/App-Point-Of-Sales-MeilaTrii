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
                        {{-- kita ambil datanya dari pembelian --}}
                        <strong>Purchase Invoice</strong><br><br>
                        <b>Payment Due:</b> {{ $pembelian->created_at->format('d-m-Y') }}<br>
                        <b>Supplier:</b> {{ $pembelian->supplier->nama }}<br>
                        <b>Account:</b> {{ $pembelian->supplier->no_hp }}<br>
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
                                <th class="navbar-indigo">Product</th>
                                <th class="navbar-indigo">Quantity</th>
                                <th class="navbar-indigo">Subtotal</th>
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
                                    </td>
                                </tr>
                            @endforeach
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
                        We accept various payment methods, including Visa, Mastercard, American Express, and Paypal.
                        By using a convenient payment method for you, we hope to provide a better shopping experience for you.
                        {{-- Kami menerima berbagai metode pembayaran, termasuk Visa, Mastercard, American Express, dan Paypal.
                        Dengan menggunakan metode pembayaran yang nyaman bagi Anda,
                        kami berharap dapat memberikan pengalaman berbelanja yang lebih baik untuk Anda. --}}
                    </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <p class="lead">Amount Due 2/22/2014</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Total:</th>
                                <td>Rp. {{ number_format($pembelian->harga, 0, ',', '.') }}</td>
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
