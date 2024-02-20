<?php

namespace App\Http\Controllers;

use App\Models\PembelianDetail;
use Illuminate\Http\Request;

class PembelianDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua detail pembelian dan kirimkan ke view
        $pembelianDetails = PembelianDetail::all();
        return view('pembelian_details.index', compact('pembelianDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan form untuk membuat detail pembelian baru
        return view('pembelian_details.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            // Atur aturan validasi sesuai kebutuhan Anda
        ]);

        // Buat detail pembelian baru dan simpan ke database
        PembelianDetail::create($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pembelian_details.index')->with('success', 'Pembelian detail created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PembelianDetail $pembelianDetail)
    {
        // Tampilkan detail pembelian tertentu
        return view('pembelian_details.show', compact('pembelianDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PembelianDetail $pembelianDetail)
    {
        // Tampilkan form untuk mengedit detail pembelian
        return view('pembelian_details.edit', compact('pembelianDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PembelianDetail $pembelianDetail)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            // Atur aturan validasi sesuai kebutuhan Anda
        ]);

        // Update detail pembelian yang ada dalam database
        $pembelianDetail->update($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pembelian_details.index')->with('success', 'Pembelian detail updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PembelianDetail $pembelianDetail)
    {
        // Hapus detail pembelian yang ada dalam database
        $pembelianDetail->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pembelian_details.index')->with('success', 'Pembelian detail deleted successfully');
    }
}
