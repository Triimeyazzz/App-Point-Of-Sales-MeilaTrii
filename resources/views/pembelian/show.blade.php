@extends('layouts.app')

@section('title')
    Purchase Details
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h5>
                                Supplier: {{ $pembelian->supplier->nama }}
                                <small class="float-right">Date: {{ now()->format('d-m-Y') }}</small>
                            </h5>
                        </div>
                        <!-- /.col -->
                    </div>

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
                                        <th class="navbar-indigo">Total</th>
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
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-8">
                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                            </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <!--Jumlah yang Harus Dibayar -->
                            <p class="lead">Amount Due {{ $pembelian->created_at->format('d-m-Y') }}</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Grand Total:</th>
                                        <td>Rp. {{ number_format($pembelian->harga, 0, ',', '.') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
<div class="row no-print">
                        <div class="col-12">
                            <a href="print" rel="noopener" target="_blank" class="btn btn-default">
                                <i class="fas fa-print"></i> Print</a>
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
