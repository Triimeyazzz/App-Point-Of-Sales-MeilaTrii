<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\ReportController;
// use itu artinya menggunakan,
// jadi apapun isi di dalam folder itu,
// bisa digunakan semuanya

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Login
Route::get('/', function () {
    return redirect('login');
});


//Laravel/UI auth
Auth::routes();

//Middleware untuk admin
Route::middleware('auth')->group(function () {
    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //User
    Route::resource('/users', UserController::class)->middleware('role:Admin');

    //Pelanggan
    Route::resource('/pelanggan', PelangganController::class);
    Route::get('cari-pelanggan', [PelangganController::class, 'cari'])->name('cari.pelanggan');

    //Supplier
    Route::resource('/supplier', SupplierController::class);
    Route::get('cari-supplier', [SupplierController::class, 'cari'])->name('cari.supplier');

    //Kategori
    Route::resource('/kategori', KategoriController::class);

    //Brand
    Route::resource('/brand', BrandController::class);

    //Unit
    Route::resource('/unit', UnitController::class);

    //Produk
    Route::resource('/produk', ProdukController::class);
    Route::get('cari-produk', [ProdukController::class, 'cari'])->name('cari.produk');
    Route::get('produk-detail', [ProdukController::class, 'detail'])->name('produk.detail');

    //Pembelian
    Route::resource('/pembelian', PembelianController::class);

    //lalu tambah parameter untuk mengambil id pembelian tersebut, supaya bisa terkirim ke controller
    Route::get('/pembelian/print/{id}', [PembelianController::class, 'print'])->name('pembelian.print');

    //Penjualan
    Route::resource('/penjualan', PenjualanController::class);

    //lalu tambah parameter untuk mengambil id penjualan tersebut, supaya bisa terkirim ke controller
    Route::get('/penjualan/print/{id}', [PenjualanController::class, 'print'])->name('penjualan.print');

    //Report
    Route::get('/laporan-penjualan', [ReportController::class, 'sales'])->name('sales.report');
    Route::get('/laporan-pembelian', [ReportController::class, 'purchase'])->name('purchase.report');

    //Settings
    Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');
    Route::put('/pengaturan-update', [PengaturanController::class, 'update'])->name('pengaturan.update');

    //print


});
