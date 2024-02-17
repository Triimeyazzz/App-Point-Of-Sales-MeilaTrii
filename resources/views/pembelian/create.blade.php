@extends('layouts.app')

@section('title')
    Tambah Pembelian
@endsection

@push('styles')
    <style>
        #product-list {
            list-style: none;
            padding: 0;
            margin: 0;
            position: absolute;
            display: none;
            border: 1px solid #ccc;
            background: #fff;
            width: 95%;
            /* Sesuaikan lebar sesuai kebutuhan */
            z-index: 1;
        }

        #product-list li {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            cursor: pointer;
        }

        #product-list li:hover {
            background-color: #f0f0f0;
        }

        #product-list li a {
            text-decoration: none;
            color: #333;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                @include('layouts.session_messages')
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Pembelian</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('pembelian.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="supplier_id">Supplier</label>
                                        <select name="supplier_id" id="supplier_id" class="form-control" required>
                                            <option value="">Pilih Supplier</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="produk_id">Produk</label>
                                        <input type="text" class="form-control" id="search" placeholder="Cari Produk">
                                        <ul id="product-list" class="list-group">
                                            {{-- Daftar produk akan ditampilkan di sini --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <table class="table table-bordered cart-table">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th width="10%">Kuantitas</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                        <th width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" align="right">Jumlah Total:</td>
                                        <td class="total-amount">0.00</td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#search').on('input', function() {
                var query = $(this).val();

                $.ajax({
                    url: '{{ route('cari.produk') }}',
                    type: 'GET',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#product-list').empty();
                        $.each(data, function(index, product) {
                            $('#product-list').append('<li data-id="' + product.id +
                                '" data-name="' + product.nama + '" data-price="' +
                                product.harga_beli + '">' + product.nama + '</li>');
                        });

                        // Menampilkan daftar produk mengambang
                        $('#product-list').show();
                    }
                });
            });

            // Fungsi untuk menambahkan produk ke keranjang
            $(document).on('click', '#product-list li', function() {
                var productId = $(this).data('id');
                var productName = $(this).data('name');
                var productPrice = $(this).data('price');

                // Menambahkan produk ke tabel belanja secara dinamis
                var newRow = $('<tr data-id="' + productId + '" data-price="' + productPrice + '"><td>' +
                    productName +
                    '</td><td><input type="number" class="form-control quantity" value="1" min="1"></td><td>' +
                    productPrice + '</td><td class="total-price">' + productPrice +
                    '</td><td><span class="btn btn-sm btn-danger remove-from-cart">Hapus</span></td></tr>'
                );

                // Menyimpan data produk dalam hidden input
                var hiddenInput = $('<input type="hidden" name="items[]" value="">');
                hiddenInput.val(JSON.stringify({
                    'product_id': productId,
                    'quantity': 1, // default quantity, bisa diubah sesuai kebutuhan
                    'price': productPrice
                }));
                newRow.append(hiddenInput);

                $('.cart-table tbody').append(newRow);
                updateTotal();
            });

            // Fungsi untuk menghapus produk dari tabel belanja
            $(document).on('click', '.remove-from-cart', function() {
                var row = $(this).closest('tr');
                row.remove();
                updateTotal();
            });

            // Fungsi untuk mengupdate total harga saat kuantitas diubah
            $(document).on('input', '.quantity', function() {
                var quantity = $(this).val();
                var price = $(this).closest('tr').data('price');
                var total = quantity * price;
                $(this).closest('tr').find('.total-price').text(total.toFixed(2));
                updateTotal();
            });

            // Menyembunyikan daftar produk dan tabel belanja ketika mengklik di luar daftar
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#product-list, #search, #cart-table').length) {
                    $('#product-list').hide();
                }
            });

            // Fungsi untuk mengupdate total harga seluruh belanjaan
            function updateTotal() {
                var total = 0;
                $('.cart-table tbody tr').each(function() {
                    var quantity = $(this).find('.quantity').val();
                    var price = $(this).data('price');
                    var subtotal = quantity * price;
                    total += subtotal;

                    // Update quantity di hidden input
                    var hiddenInput = $(this).find('input[name="items[]"]');
                    var itemData = JSON.parse(hiddenInput.val());
                    itemData.quantity = quantity;
                    hiddenInput.val(JSON.stringify(itemData));

                    $(this).find('.total-price').text(subtotal.toFixed(2));
                });
                $('.cart-table tfoot .total-amount').text(total.toFixed(2));
            }
        });
    </script>
@endpush
