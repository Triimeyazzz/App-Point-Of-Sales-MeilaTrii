<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datas = Pelanggan::orderBy('nama', 'asc');

        if (request()->ajax()) {
            return datatables()->of($datas)
                ->addIndexColumn()
                ->addColumn('actions', function ($data) {
                    return view('pelanggan._actions', compact('data'));
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('pelanggan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Pelanggan::create($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Customer successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
        return view('pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        //
        $pelanggan->update($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Customer detail updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        //
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Customer Successfully deleted.');
    }
}
