<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\SupplierController; //kalau ditulis disini

use App\Http\Controllers;

// use itu artinya menggunakan,
// jadi apapun isi di dalam folder itu,
// bisa digunakan semuanya

use App\Models\Kategori;
use App\Models\Supplier;
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
Route::middleware('auth')->group(function () {
    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //User
    Route::resource('/users', UserController::class);
});

Route::get('/member', [\App\Http\Controllers\MemberController::class, 'index'])->name('member');
Route::get('/suplier', [SupplierController::class, 'index'])->name('suplier');
Route::get('/kategori', [Controllers\KategoriController::class, 'index'])->name('kategori'); //merahnya ilang
Route::get('/produk', [Controllers\ProdukController::class, 'index'])->name('produk'); //bisa juga begini
Route::get('/brand', [Controllers\BrandController::class, 'index'])->name('brand');
Route::get('/unit', [Controllers\UnitController::class, 'index'])->name('unit');
Route::get('/laporan-pembelian', [Controllers\PembelianController::class, 'index'])->name('pembelian');
Route::get('/laporan-pengeluaran', [Controllers\PengeluaranController::class, 'index'])->name('pengeluaran');
Route::get('/pengaturan', [Controllers\PengaturanController::class, 'index'])->name('pengaturan');
