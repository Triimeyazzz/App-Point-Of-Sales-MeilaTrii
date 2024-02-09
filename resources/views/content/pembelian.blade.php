@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Pembelian List
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Supplier ID</th>
                                    <th>Kuantitas</th>
                                    <th>Harga</th>
                                    <th>Diskon</th>
                                    <th>Bayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pembelians as $pembelian)
                                    <tr>
                                        <td>{{ $pembelian->id }}</td>
                                        <td>{{ $pembelian->supplier_id }}</td>
                                        <td>{{ $pembelian->kuantitas }}</td>
                                        <td>{{ $pembelian->harga }}</td>
                                        <td>{{ $pembelian->diskon }}</td>
                                        <td>{{ $pembelian->bayar }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
