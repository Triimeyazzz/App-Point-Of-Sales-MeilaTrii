<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\SupplierController; //kalau ditulis disini

use App\Http\Controllers;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RoleController;
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
Route::middleware('auth', 'role:Admin')->group(function () {
    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //User
    Route::resource('/users', UserController::class);

    //Role
    Route::resource('/roles', RoleController::class);

    //Member
    Route::resource('/members', MemberController::class);
});
