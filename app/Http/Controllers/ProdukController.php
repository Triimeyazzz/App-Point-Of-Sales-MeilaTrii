<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datas = Produk::orderBy('created_at', 'desc');

        if (request()->ajax()) {
            return datatables()->of($datas)
                ->addIndexColumn()
                ->addColumn('kategori', function ($data) {
                    return $data->kategori->nama;
                })
                ->addColumn('brand', function ($data) {
                    return $data->brand->nama;
                })
                ->addColumn('unit', function ($data) {
                    return $data->unit->nama;
                })
                ->addColumn('harga_beli', function ($data) {
                    return 'Rp. ' . number_format($data->harga_beli, 0, ',', '.');
                })
                ->addColumn('harga_jual', function ($data) {
                    return 'Rp. ' . number_format($data->harga_jual, 0, ',', '.');
                })
                ->addColumn('actions', function ($data) {
                    return view('produk._actions', compact('data'));
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('produk.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kategoris = Kategori::all();
        $brands = Brand::all();
        $units = Unit::all();

        return view('produk.create', compact('kategoris', 'brands', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Produk::create($request->all());

        return redirect()->route('produk.index')->with('success', 'Produk Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk Berhasil dihapus');
    }

    //Custom
    public function cari(Request $request)
    {
        $query = $request->get('query');
        $produk = Produk::where('nama', 'like', '%' . $query . '%')->get();

        return response()->json($produk);
    }
}
