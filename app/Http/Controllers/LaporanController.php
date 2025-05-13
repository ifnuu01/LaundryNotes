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
            ->where('status', 'selesai')
            ->where('tanggal_selesai', '>=', now()->subYear())
            ->groupBy(DB::raw('MONTH(tanggal_selesai)'))
            ->get();

        return view('laporan.jumlah-pemesanan', compact('pemesanan'));
    }

    public function pendapatan()
    {
        $pendapatan = Pesanan::select(
                DB::raw('MONTH(tanggal_selesai) as bulan'),
                DB::raw('SUM(pesanans.berat_kg * pakets.harga_per_kg) as total_pendapatan')
            )
            ->join('pakets', 'pesanans.paket_id', '=', 'pakets.id')
            ->where('pesanans.status', 'selesai')
            ->groupBy(DB::raw('MONTH(tanggal_selesai)'))
            ->get();

        return view('laporan.total-pendapatan', compact('pendapatan'));
    }

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