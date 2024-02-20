<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Supplier;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $users_count = User::count();
        $product_count = Produk::count();
        $supplier_count = Supplier::count();
        $pelanggan_count = Pelanggan::count();

        return view('dashboard.index', compact('users_count', 'product_count', 'supplier_count', 'pelanggan_count'));
    }
}
