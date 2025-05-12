<?php

namespace App\Http\Controllers;

use App\Models\Pakets;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanan = Pesanan::all();
        return view('pesanan.list-pesanan', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pakets = Pakets::all();
        return view('pesanan.create', compact('pakets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:100|',
            'berat_kg' => 'required|numeric',
            'status' => 'required',
            'catatan' => 'nullable|string|max:5000',
        ]);

        Pesanan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'berat_kg' => $request->berat_kg,
            'id_paket' => $request->id_paket,
            'tanggal_pesan' => time(),
            'tanggal_selesai' => $request->tanggal_selesai,
            'status' => "proses",
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesanan $pesanan)
    {
        if (!$pesanan) {
            return redirect()->route('pesanan.index')->with('error', 'Pesanan tidak ditemukan');
        }
        return view('pesanan.detail', compact('pesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        if (!$pesanan) {
            return redirect()->route('pesanan.index')->with('error', 'Pesanan tidak ditemukan');
        }
        $paket = Pakets::all();
        return view('pesanan.edit', compact('pesanan', 'paket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:100|',
            'berat_kg' => 'required|numeric',
            'tanggal_pesan' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'status' => 'required',
            'catatan' => 'nullable|string|max:5000',
        ]);

        $pesanan->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'berat_kg' => $request->berat_kg,
            'tanggal_pesan' => $request->tanggal_pesan,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status' => $request->status,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        if (!$pesanan) {
            return redirect()->route('pesanan.index')->with('error', 'Pesanan tidak ditemukan');
        }

        $pesanan->delete();
        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus');
    }
}
