<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function sales()
    {

        $datas = Penjualan::orderBy('created_at', 'desc');

        if (request()->ajax()) {
            return datatables()->of($datas)
                ->addIndexColumn()
                ->addColumn('pelanggan', function ($data) {
                    return $data->pelanggan->nama;
                })
                ->addColumn('harga', function ($data) {
                    return 'Rp. ' . number_format($data->harga, 0, ',', '.');
                })
                ->addColumn('keuntungan', function ($data) {
                    $keuntungan = PenjualanDetail::where('penjualan_id', $data->id)->sum('keuntungan');
                    return 'Rp. ' . number_format($keuntungan, 0, ',', '.');
                })
                ->addColumn('tanggal', function ($data) {
                    return Carbon::parse($data->created_at)->format('d-F-Y');
                })
                ->make(true);
        }

        return view('laporan.penjualan');
    }

    public function purchase()
    {
        $datas = Pembelian::orderBy('created_at', 'desc');

        if (request()->ajax()) {
            return datatables()->of($datas)
                ->addIndexColumn()
                ->addColumn('supplier', function ($data) {
                    return $data->supplier->nama;
                })
                ->addColumn('harga', function ($data) {
                    return 'Rp. ' . number_format($data->harga, 0, ',', '.');
                })
                ->addColumn('tanggal', function ($data) {
                    return Carbon::parse($data->created_at)->format('d-F-Y');
                })
                ->make(true);
        }

        return view('laporan.pembelian');
    }
}
