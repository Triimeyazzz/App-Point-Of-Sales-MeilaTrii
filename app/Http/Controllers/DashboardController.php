<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Kategori;
use App\Models\Pelanggan;
use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\Supplier;
use App\Models\Produk;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $product_count = Produk::count();
        $supplier_count = Supplier::count();
        $pelanggan_count = Pelanggan::count();
        $pembelian_count = Pembelian::count();
        $penjualan_count = Penjualan::count();
        $kategori_count = Kategori::count();
        $brand_count = Brand::count();
        $unit_count = Unit::count();
        $cekprofit = PenjualanDetail::sum('keuntungan');
        $profit = number_format($cekprofit, 0, ',', '.');

        //Chart Penjualan
        $monthlySales = Penjualan::selectRaw('MONTH(created_at) as bulan, SUM(kuantitas) as total_penjualan')
            ->groupByRaw('MONTH(created_at)')
            ->orderBy('bulan')
            ->get();
        // Inisialisasi array untuk menyimpan total penjualan per bulan
        $totalPenjualanPerBulan = array_fill(1, 12, 0);
        // Memasukkan data yang ada ke dalam array totalPenjualanPerBulan
        foreach ($monthlySales as $monthlySale) {
            $totalPenjualanPerBulan[$monthlySale->bulan] = $monthlySale->total_penjualan;
        }
        // Mengubah array menjadi indexed array numerik
        $totalPenjualanPerBulan = array_values($totalPenjualanPerBulan);

        //Chart Pembelian
        $monthlyPurchases = Pembelian::selectRaw('MONTH(created_at) as bulan, SUM(kuantitas) as total_pembelian')
            ->groupByRaw('MONTH(created_at)')
            ->orderBy('bulan')
            ->get();
        // Inisialisasi array untuk menyimpan total pembelian per bulan
        $totalPembelianPerBulan = array_fill(1, 12, 0);
        // Memasukkan data yang ada ke dalam array totalPembelianPerBulan
        foreach ($monthlyPurchases as $monthlyPurchase) {
            $totalPembelianPerBulan[$monthlyPurchase->bulan] = $monthlyPurchase->total_pembelian;
        }
        // Mengubah array menjadi indexed array numerik
        $totalPembelianPerBulan = array_values($totalPembelianPerBulan);

        $recentProducts = Produk::orderBy('created_at', 'desc')->limit(5)->get();

        return view('dashboard.index', compact('product_count', 'supplier_count', 'pelanggan_count', 'pembelian_count', 'penjualan_count', 'kategori_count', 'brand_count', 'profit', 'totalPenjualanPerBulan', 'totalPembelianPerBulan', 'recentProducts','unit_count'));
    }
}
