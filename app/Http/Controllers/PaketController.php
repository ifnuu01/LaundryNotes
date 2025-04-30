<?php

namespace App\Http\Controllers;

use App\Models\Pakets;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paket = Pakets::all();
        return view('layanan.list-layanan', compact('paket'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'harga_per_kg' => 'required|numeric',
            'status' => 'required',
        ]);

        Pakets::create([
            'nama' => $request->nama,
            'harga_per_kg' => $request->harga_per_kg,
            'status' => $request->status,
        ]);

        return redirect()->route('layanan.list-layanan')->with('success', 'Paket berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pakets $paket)
    {
        if (!$paket) {
            return redirect()->route('layanan.list-layanan')->with('error', 'Data tidak ditemukan');
        }
        return view('layanan.detail', compact('paket'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pakets $paket)
    {
        if (!$paket) {
            return redirect()->route('layanan.list-layanan')->with('error', 'Data tidak ditemukan');
        }
        return view('layanan.edit', compact('paket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pakets $paket)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'harga_per_kg' => 'required|numeric',
            'status' => 'required',
        ]);

        $paket->update([
            'nama' => $request->nama,
            'harga_per_kg' => $request->harga_per_kg,
            'status' => $request->status,
        ]);

        return redirect()->route('layanan.list-layanan')->with('success', 'Paket berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pakets $paket)
    {
        if (!$paket) {
            return redirect()->route('layanan.list-layanan')->with('error', 'Data tidak ditemukan');
        }
        $paket->delete();
        return redirect()->route('layanan.list-layanan')->with('success', 'Paket berhasil dihapus');
    }
}
