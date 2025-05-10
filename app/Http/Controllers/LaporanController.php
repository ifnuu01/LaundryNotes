<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function pemesanan()
    {
        $pemesanan = Pesanan::select(
                DB::raw('MONTH(tanggal_selesai) as bulan'),
                DB::raw('COUNT(*) as jumlah_pesanan')
            )
            ->groupBy(DB::raw('MONTH(tanggal_selesai)'))
            ->get();

        return view('laporan.jumlah-pemesanan', compact('pemesanan'));
    }

    // public function pendapatan()
    // {
    //     $pendapatan = Pesanan::select(
    //             DB::raw('MONTH(tanggal_selesai) as bulan'),
    //             DB::raw('SUM(total_harga) as jumlah_pendapatan')
    //         )
    //         ->groupBy(DB::raw('MONTH(tanggal_selesai)'))
    //         ->get();

    //     return view('laporan.pendapatan', compact('pendapatan'));
    // }

    public function paketTerlaris()
    {
        $paketTerlaris = Pesanan::select('paket_id', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('paket_id')
            ->orderByDesc('jumlah')
            ->with('paket')
            ->take(5)
            ->get();

        return view('laporan.paket_terlaris', compact('paketTerlaris'));
    }

    public function kinerjaKasir()
    {
        $kinerjaKasir = Pesanan::select('kasir_id', DB::raw('COUNT(*) as jumlah_pesanan'), DB::raw('SUM(total_harga) as total_pendapatan'))
            ->groupBy('kasir_id')
            ->with('kasir')
            ->get();

        return view('laporan.kinerja_kasir', compact('kinerjaKasir'));
    }
}