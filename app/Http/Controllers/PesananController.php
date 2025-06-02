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
        // diurutkan dari tanggal pesan terbaru
        $pesanans = Pesanan::orderBy('tanggal_pesan', 'desc')->get();
        return view('pesanan.list-pesanan', compact('pesanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pakets = Pakets::where('status', 'Aktif')->get();
        return view('pesanan.create', compact('pakets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_pelanggan' => 'required|string|max:100|',
            'berat_kg' => 'required|numeric',
            'catatan' => 'nullable|string|max:5000',
            'paket_id' => 'required|exists:pakets,id',
            // bayar tidak boleh lebih kecil paket harga per kg * berat kg
            'bayar' => 'required|numeric|min:' . ($request->berat_kg * Pakets::find($request->paket_id)->harga_per_kg),
        ]);

        Pesanan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'berat_kg' => $request->berat_kg,
            'user_id' => auth()->user()->id,
            'paket_id' => $request->paket_id,
            'tanggal_pesan' => now()->toDateString(),
            'status' => "Proses",
            'catatan' => $request->catatan,
            'bayar' => $request->bayar,
        ]);

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pesanan = Pesanan::find($id);
        if (!$pesanan) {
            return redirect()->route('pesanan.index')->with('error', 'Pesanan tidak ditemukan');
        }
        // harga total
        $paket = Pakets::find($pesanan->paket_id);
        $harga_total = $paket->harga_per_kg * $pesanan->berat_kg;
        return view('pesanan.detail', compact('pesanan', 'harga_total'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pesanan = Pesanan::find($id);
        if (!$pesanan) {
            return redirect()->route('pesanan.index')->with('error', 'Pesanan tidak ditemukan');
        }
        $pakets = Pakets::where('status', 'Aktif')->get();
        // harga total
        $harga_total = $pesanan->paket->harga_per_kg * $pesanan->berat_kg;
        return view('pesanan.edit', compact('pesanan', 'pakets', 'harga_total'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pesanan = Pesanan::find($id);
        if (!$pesanan) {
            return redirect()->route('pesanan.index')->with('error', 'Pesanan tidak ditemukan');
        }

        // dd($request->all());
        $request->validate([
            'nama_pelanggan' => 'required|string|max:100|',
            'berat_kg' => 'required|numeric',
            'catatan' => 'nullable|string|max:5000',
            'paket_id' => 'required|exists:pakets,id',
            'status' => 'required|in:Proses,Selesai,Dibatalkan',
            'bayar' => 'required|numeric|min:' . ($request->berat_kg * Pakets::find($request->paket_id)->harga_per_kg),
        ]);

        $pesanan->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'berat_kg' => $request->berat_kg,
            'user_id' => auth()->user()->id,
            'paket_id' => $request->paket_id,
            'status' => $request->status,
            'catatan' => $request->catatan,
            'tanggal_selesai' => $request->status == 'Selesai' || $request->status == 'Dibatalkan' ? now()->toDateString() : null,
            'bayar' => $request->bayar,
        ]);

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pesanan = Pesanan::find($id);
        if (!$pesanan) {
            return redirect()->route('pesanan.index')->with('error', 'Pesanan tidak ditemukan');
        }
        $pesanan->delete();
        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus');
    }

    public function cetak($id)
    {
        $pesanan = Pesanan::with(['user', 'paket'])->findOrFail($id);
        $harga_total = $pesanan->paket->harga_per_kg * $pesanan->berat_kg;
        $kembali = $pesanan->bayar - $harga_total;
        return view('pesanan.struk', compact('pesanan', 'harga_total', 'kembali'));
    }
}
