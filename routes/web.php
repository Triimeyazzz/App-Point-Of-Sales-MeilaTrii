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
use App\Http\Controllers\CpuTrafficController;
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

//Middleware
Route::middleware('auth','role:Admin')->group(function () {
    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //User
    Route::resource('/users', UserController::class);

    //Pelanggan sss
    Route::resource('/pelanggan', PelangganController::class);

    //Supplier
    Route::resource('/supplier', SupplierController::class);

    //Kategori
    Route::resource('/kategori', KategoriController::class);

    //Brand
    Route::resource('/brand', BrandController::class);

    //Unit
    Route::resource('/unit', UnitController::class);

    //Produk
    Route::resource('/produk', ProdukController::class);
    Route::get('cari-produk', [ProdukController::class, 'cari'])->name('cari.produk');

    //Pembelian
    Route::resource('/pembelian', PembelianController::class);

    //Penjualan
    Route::resource('/penjualan', PenjualanController::class);
});
