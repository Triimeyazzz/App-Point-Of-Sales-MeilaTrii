<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\PembelianDetail;
use App\Models\Produk;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
                    return Carbon::parse($data->created_at)->isoFormat('D MMMM Y');
                })
                ->addColumn('actions', function ($data) {
                    return view('pembelian._actions', compact('data'));
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('pembelian.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Menampilkan form untuk membuat pembelian baru (jika diperlukan)
        $suppliers = Supplier::all();
        $produks = Produk::all();

        return view('pembelian.create', compact('suppliers', 'produks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Menyimpan data pembelian baru ke dalam database (jika diperlukan)
        $input = $request->all();

        // Hitung jumlah kuantitas keseluruhan dan harga keseluruhan
        $totalQuantity = 0;
        $totalPrice = 0;

        foreach ($request->input('items') as $itemJson) {
            $item = json_decode($itemJson, true);
            $totalQuantity += $item['quantity'];
            $totalPrice += $item['quantity'] * $item['price'];
        }

        $input['kuantitas'] = $totalQuantity;
        $input['harga'] = $totalPrice;
        $pembelian = Pembelian::create($input);

        foreach ($request->input('items') as $itemJson) {
            $item = json_decode($itemJson, true);
            PembelianDetail::create([
                'pembelian_id' => $pembelian->id,
                'produk_id' => $item['product_id'],
                'kuantitas' => $item['quantity'],
                'harga' => $item['price'],
            ]);

            $stok_produk = Produk::find($item['product_id']);
            $stok_produk->update([
                'stok' => $stok_produk->stok + $item['quantity'],
                'harga_beli' => $item['price'],
            ]);
        }

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian)
    {
        // Menampilkan detail pembelian tertentu (jika diperlukan)
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $pembelian)
    {
        // Menampilkan form untuk mengedit pembelian tertentu (jika diperlukan)
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembelian $pembelian)
    {
        // Memperbarui data pembelian tertentu di dalam database (jika diperlukan)
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        // Menghapus data pembelian tertentu dari database (jika diperlukan)
        $pembelian->delete();

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil dihapus');
    }
}
