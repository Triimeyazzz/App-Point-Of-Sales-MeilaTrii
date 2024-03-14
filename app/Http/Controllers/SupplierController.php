<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $suppliers = Supplier::orderBy('nama', 'asc');

        if (request()->ajax()) {
            return datatables()->of($suppliers)
                ->addIndexColumn()
                ->addColumn('actions', function ($data) {
                    return view('supplier._actions', compact('data'));
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('supplier.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Supplier::create($request->all());

        return redirect()->route('supplier.index')->with('success', 'Supplier successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
        $supplier->update($request->all());

        return redirect()->route('supplier.index')->with('success', 'Supplier has been successfully changed.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
        $supplier->delete();

        return redirect()->back()->with('success', 'Supplier successfully deleted.');
    }

    public function cari(Request $request)
    {
        $query = $request->get('query');
        $supplier = Supplier::where('nama', 'like', '%' . $query . '%')->take(10)->get();

        return response()->json($supplier);
    }
}
