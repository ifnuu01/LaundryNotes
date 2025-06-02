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
        $pakets = Pakets::orderBy('created_at', 'desc')->get();
        // dd($pakets);
        return view('layanan.list-layanan', compact('pakets'));
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
        ]);

        Pakets::create([
            'nama' => $request->nama,
            'harga_per_kg' => $request->harga_per_kg,
            'status' => 'Aktif',
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('layanan.index')->with('success', 'Paket berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $paket = Pakets::find($id);
        if (!$paket) {
            return redirect()->route('layanan.index')->with('error', 'Data tidak ditemukan');
        }
        // dd($paket);
        return view('layanan.detail', compact('paket'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paket = Pakets::find($id);
        if (!$paket) {
            return redirect()->route('layanan.index')->with('error', 'Data tidak ditemukan');
        }
        // dd($paket);
        return view('layanan.edit', compact('paket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'harga_per_kg' => 'required|numeric',
            'status' => 'required',
        ]);

        $paket = Pakets::find($id);
        if (!$paket) {
            return redirect()->route('layanan.index')->with('error', 'Data tidak ditemukan');
        }

        $paket->update([
            'nama' => $request->nama,
            'harga_per_kg' => $request->harga_per_kg,
            'status' => $request->status,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('layanan.index')->with('success', 'Paket berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paket = Pakets::find($id);
        if (!$paket) {
            return redirect()->route('layanan.index')->with('error', 'Data tidak ditemukan');
        }
        $paket->delete();
        return redirect()->route('layanan.index')->with('success', 'Paket berhasil dihapus');
    }
}
