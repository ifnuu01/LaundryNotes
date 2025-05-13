<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // pesanan dengan status selesai Proses berarti ada Selesai dan Dibatalkan
        $riwayats = Pesanan::whereIn('status', ['Selesai', 'Dibatalkan'])
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($riwayats);
        return view('riwayat.list-riwayat', compact('riwayats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $riwayat = Pesanan::find($id);
        if (!$riwayat) {
            return redirect()->route('riwayat.list-riwayat')->with('error', 'Data tidak ditemukan');
        }

        $harga_total = $riwayat->paket->harga_per_kg * $riwayat->berat_kg;
        return view('riwayat.detail', compact('riwayat', 'harga_total'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
