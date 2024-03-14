@extends('layouts.app')

@section('title')
    Add Sales
@endsection

@push('select2')
    <link rel="stylesheet" href="../../../plugins/select2/css/select2.min.css">
@endpush

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
                        <h3 class="card-title">Add Sales</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('penjualan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cari">Customer</label>
                                        <select class="form-control select2" id="cari" name="pelanggan_id"
                                            style="width: 100%;" data-placeholder="Search Customer...">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="search">Product</label>
                                        <select class="form-control select2" id="search" style="width: 100%;"
                                            data-placeholder="Search Product...">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <table class="table table-bordered cart-table">
                                <thead>
                                    <tr>
                                        <th class="navbar-indigo">Product Name</th>
                                        <th width="10%" class="navbar-indigo">Stock</th>
                                        <th width="10%" class="navbar-indigo">Quantity</th>
                                        <th class="navbar-indigo">Price</th>
                                        <th class="navbar-indigo">Total</th>
                                        <th width="10%" class="navbar-indigo">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" align="right">Total Amount:</td>
                                        <td class="total-amount">0.00</td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Select2 -->
    <script src="../../../plugins/select2/js/select2.full.min.js"></script>

    <script>
        $(document).ready(function() {
            //Cari Pelanggan
            $(document).ready(function() {
                $('#cari').select2({
                    placeholder: $(this).data('placeholder'),
                    ajax: {
                        url: '{{ route('cari.pelanggan') }}',
                        dataType: 'json',
                        delay: 250,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        id: item.id,
                                        text: item.nama
                                    }
                                })
                            };
                        },
                        cache: true
                    },
                    minimumInputLength: 1
                });
            });

            $('#search').select2({
                placeholder: $(this).data('placeholder'),
                ajax: {
                    url: '{{ route('cari.produk') }}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.nama
                                }
                            })
                        };
                    },
                    cache: true
                },
                minimumInputLength: 1
            });

            // Fungsi untuk menangani perubahan nilai pada input quantity
            $(document).on('change', '.quantity', function() {
                var quantityInput = $(this);
                var newRow = quantityInput.closest('tr');
                var currentQuantity = parseInt(quantityInput.val());
                var productStock = parseInt(newRow.find('.stock').text());

                if (currentQuantity <= 0 || isNaN(currentQuantity)) {
                    alert('Kuantitas harus lebih besar dari 0.');
                    quantityInput.val(1);
                } else if (currentQuantity > productStock) {
                    alert('Stok produk tidak mencukupi untuk kuantitas yang dimasukkan.');
                    quantityInput.val(productStock);
                }

                updateTotal();
            });

            // Fungsi untuk menambahkan produk ke keranjang
            $('#search').on('select2:select', function(e) {
                var productId = e.params.data.id;
                var productName = e.params.data.text;

                $.ajax({
                    url: '{{ route('produk.detail') }}', // Ganti dengan route yang tepat untuk mendapatkan detail produk
                    type: 'GET',
                    data: {
                        id: productId
                    },
                    success: function(response) {
                        console.log(response);
                        var productPrice = response.harga_jual;
                        var productStock = response.stok;

                        // Memeriksa apakah stok produk kosong
                        if (productStock <= 0) {
                            alert(
                                'Stok produk kosong. Produk tidak dapat ditambahkan ke keranjang.'
                                );
                            return;
                        }

                        // Memeriksa apakah produk sudah ada dalam tabel
                        var existingRow = $('.cart-table tbody tr[data-id="' + productId +
                            '"]');
                        if (existingRow.length > 0) {
                            var quantityInput = existingRow.find('.quantity');
                            var currentQuantity = parseInt(quantityInput.val());
                            var currentStock = parseInt(existingRow.find('.stock').text());

                            if (currentQuantity + 1 <= currentStock) {
                                quantityInput.val(currentQuantity + 1);
                            } else {
                                alert(
                                    'Stok produk tidak mencukupi untuk penambahan kuantitas.'
                                    );
                            }
                        } else {
                            // Menambahkan produk ke tabel belanja secara dinamis
                            var newRow = $('<tr data-id="' + productId + '" data-price="' +
                                productPrice + '"><td>' +
                                productName + '<td class="stock">' + productStock +
                                '</td>' +
                                '</td><td><input type="number" class="form-control quantity" value="1" min="1"></td><td>' +
                                productPrice + '</td><td class="total-price">' +
                                productPrice +
                                '</td><td><span class="btn btn-sm btn-danger remove-from-cart">Hapus</span></td></tr>'
                            );

                            var hiddenInput = $(
                                '<input type="hidden" name="items[]" value="">');
                            hiddenInput.val(JSON.stringify({
                                'product_id': productId,
                                'quantity': 1,
                                'price': productPrice
                            }));
                            newRow.append(hiddenInput);

                            $('.cart-table tbody').append(newRow);
                        }
                        updateTotal();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Terjadi kesalahan. Mohon coba lagi.');
                    }
                });
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
            $('#search').on('select2:select', function(e) {
                $(this).select2('close'); // Menutup dropdown Select2
                $(this).val(null).trigger('change'); // Mengosongkan hasil pencarian
            });

            // Fungsi untuk mengupdate total harga seluruh belanjaan
            function updateTotal() {
                var total = 0;
                $('.cart-table tbody tr').each(function() {
                    var quantity = $(this).find('.quantity').val();
                    var price = $(this).data('price');
                    var subtotal = quantity * price;
                    total += subtotal;

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
