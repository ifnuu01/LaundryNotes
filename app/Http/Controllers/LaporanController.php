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
            // ->where('tanggal_selesai', '>=', now()->subYear())
            ->groupBy(DB::raw('MONTH(tanggal_selesai)'))
            ->get();

        return view('laporan.jumlah-pemesanan', compact('pemesanan'));
    }

    public function printPemesanan()
    {
        $pemesanan = Pesanan::select(
                DB::raw('MONTH(tanggal_selesai) as bulan'),
                DB::raw('COUNT(*) as jumlah_pesanan')
            )
            ->where('status', 'selesai')
            // ->where('tanggal_selesai', '>=', now()->subYear())
            ->groupBy(DB::raw('MONTH(tanggal_selesai)'))
            ->get();

        return view('laporan.print-pemesanan', compact('pemesanan'));
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
        $paketTerlaris = Pesanan::select('paket_id', DB::raw('COUNT(*) as jumlah_dipesan'), 
         'pakets.nama as nama'   
        )
            ->groupBy('paket_id')
            ->orderByDesc('jumlah_dipesan')
            ->join('pakets', 'pesanans.paket_id', '=', 'pakets.id')
            ->where('pesanans.status', 'selesai')
            ->take(5)
            ->get();

        return view('laporan.paket-terlaris', compact('paketTerlaris'));
    }

    // public function kinerjaKasir()
    // {
    //     // $kinerjaKasir = Pesanan::select('user_id', DB::raw('COUNT(*) as jumlah_pesanan'), DB::raw('SUM(total_harga) as total_pendapatan'))
    //     //     ->groupBy('user_id')
    //     //     ->join('users', 'pesanans.user_id', '=', 'users.id')
    //     //     ->where('pesanans.status', 'selesai')
    //     //     ->where('users.role', 'kasir')
    //     //     ->get();
    //     // return view('laporan.kinerja-kasir', compact('kinerjaKasir'));
    //     return view('laporan.kinerja-kasir' );
    // }
    public function kinerjaKasir()
    {
        $kinerjaKasir = Pesanan::select(
                'users.nama as nama_kasir',
                DB::raw('COUNT(pesanans.id) as jumlah_pesanan'),
                DB::raw('SUM(pesanans.berat_kg * pakets.harga_per_kg) as total_pendapatan')
            )
            ->join('users', 'pesanans.user_id', '=', 'users.id')
            ->join('pakets', 'pesanans.paket_id', '=', 'pakets.id')
            ->where('pesanans.status', 'selesai')
            ->where('users.role', 'kasir')
            ->groupBy('users.id', 'users.nama')
            ->orderByDesc('total_pendapatan')
            ->get();

        return view('laporan.kinerja-kasir', compact('kinerjaKasir'));
    }
}