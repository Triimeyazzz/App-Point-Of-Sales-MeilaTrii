<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
                ->addColumn('tanggal', function ($data) {
                    return Carbon::parse($data->created_at)->format('d-F-Y');
                })
                ->addColumn('actions', function ($data) {
                    return view('penjualan._actions', compact('data'));
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('penjualan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $customers = Pelanggan::all();
        $produks = Produk::all();

        return view('penjualan.create', compact('customers', 'produks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Menyimpan data penjualan baru ke dalam database (jika diperlukan)
        $input = $request->all();   // Menyimpan semua data input dari request

        // Hitung jumlah kuantitas keseluruhan dan harga keseluruhan
        $totalQuantity = 0;   // Menginisialisasi jumlah kuantitas keseluruhan
        $totalPrice = 0;      // Menginisialisasi harga keseluruhan

        foreach ($request->input('items') as $itemJson) {
            $item = json_decode($itemJson, true);   // Mendekode string JSON menjadi array asosiatif
            $totalQuantity += $item['quantity'];    // Menambahkan kuantitas setiap item ke jumlah kuantitas keseluruhan
            $totalPrice += $item['quantity'] * $item['price'];   // Menghitung harga keseluruhan dari semua item
        }

        $input['kuantitas'] = $totalQuantity;   // Menetapkan jumlah kuantitas keseluruhan ke dalam data input
        $input['harga'] = $totalPrice;           // Menetapkan harga keseluruhan ke dalam data input
        $penjualan = Penjualan::create($input);  // Membuat entri penjualan baru dalam database

        foreach ($request->input('items') as $itemJson) {
            $item = json_decode($itemJson, true);   // Mendekode string JSON menjadi array asosiatif
            $produk = Produk::find($item['product_id']);   // Mencari produk berdasarkan ID
            $purchase_price = $produk->harga_beli * $item['quantity'];
            PenjualanDetail::create([   // Membuat entri detail pembelian baru dalam database
                'penjualan_id' => $penjualan->id,
                'produk_id' => $item['product_id'],
                'kuantitas' => $item['quantity'],
                'harga' => $item['price'],
                'keuntungan' => $item['quantity'] * $item['price'] - $purchase_price,
            ]);

            $stok_produk = Produk::find($item['product_id']);   // Mencari produk berdasarkan ID
            $stok_produk->update([   // Memperbarui stok produk
                'stok' => $stok_produk->stok - $item['quantity'],
            ]);
        }

        return redirect()->route('penjualan.index')->with('success', 'Sales data added successfully.');   // Mengalihkan ke halaman indeks penjualan dengan pesan sukses
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        //
        $details = PenjualanDetail::where('penjualan_id', $penjualan->id)->get();
        return view('penjualan.show', compact('penjualan', 'details'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        //
        $penjualanDetails = PenjualanDetail::where('penjualan_id', $penjualan->id);
        $penjualanDetails->delete();
        $penjualan->delete();
        return redirect()->route('penjualan.index')->with('success', 'Sales data deleted successfully.');
    }
}
