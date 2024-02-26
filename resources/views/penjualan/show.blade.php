@extends('layouts.app')

@section('title')
    Sales Details
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Note:</h5>
                    This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                </div>


                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> Sales
                                <small class="float-right">Date: {{ now()->format('d-m-Y') }}</small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                        <th>Total</th>
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
                                            <td>Rp. {{ number_format($detail->harga) }}</td>
                                            <td>Rp. {{ number_format($detail->harga * $detail->kuantitas) }}</td>
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
                            <p class="lead">Amount Due {{ $penjualan->created_at }}</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Total:</th>
                                        <td>Rp. {{ number_format($penjualan->harga) }}</td>
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
                            <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i
                                    class="fas fa-print"></i> Print</a>
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection