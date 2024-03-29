<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $datas = Brand::orderBy('created_at', 'desc');

        // Mengambil data dari model Brand dan mengurutkannya berdasarkan kolom 'created_at' secara descending
        $datas = Brand::orderBy('created_at', 'desc');

        // Memeriksa apakah permintaan adalah permintaan AJAX
        if (request()->ajax()) {
            // Jika itu permintaan AJAX, gunakan DataTables untuk memformat data dan mengembalikannya sebagai JSON
            return datatables()->of($datas)
                ->addIndexColumn()
                ->addColumn('actions', function ($data) {
                    return view('brand._actions', compact('data'));
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('brand.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input = $request->all();

        Brand::create($input);

        return redirect()->back()->with('success', 'Brand successfully added.');
    }

    public function show(Brand $brand)
    {
        //
    }

    public function edit(Brand $brand)
    {
        //
    }

    public function update(Request $request, Brand $brand)
    {
        $input = $request->all();

        $brand->update($input);

        return redirect()->back()->with('success', 'Brand detail updated successfully.');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->back()->with('success', 'Brand successfully deleted.');
    }
}
