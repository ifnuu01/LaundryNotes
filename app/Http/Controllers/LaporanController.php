<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function pemesanan()
    {
        $pemesanan = Pesanan::select(
            DB::raw('YEAR(tanggal_selesai) as tahun'),
            DB::raw('COUNT(*) as jumlah_pesanan')
        )
            ->where('status', 'Selesai')
            ->whereNotNull('tanggal_selesai')
            ->groupBy(DB::raw('YEAR(tanggal_selesai)'))
            ->get();

        // Ambil tahun yang tersedia untuk dropdown
        $tahunTersedia = Pesanan::selectRaw('YEAR(tanggal_selesai) as tahun')
            ->where('status', 'Selesai')
            ->whereNotNull('tanggal_selesai')
            ->groupBy('tahun')
            ->orderBy('tahun', 'desc')
            ->pluck('tahun')
            ->toArray();

        return view('laporan.jumlah-pemesanan', compact('pemesanan', 'tahunTersedia'));
    }
    public function cetakPemesanan()
    {
        $tahun = request('tahun', now()->year);

        $pemesanan = Pesanan::select(
            DB::raw('MONTH(tanggal_selesai) as bulan'),
            DB::raw('COUNT(*) as jumlah_pesanan')
        )
            ->where('status', 'Selesai')
            ->whereNotNull('tanggal_selesai')
            ->whereYear('tanggal_selesai', $tahun)
            ->groupBy(DB::raw('MONTH(tanggal_selesai)'))
            ->get();

        $tanggalStart = Carbon::createFromDate($tahun, 1, 1)->format('d/m/Y');
        $tanggalEnd = Carbon::createFromDate($tahun, 12, 31)->format('d/m/Y');
        $totalPesanan = $pemesanan->sum('jumlah_pesanan');
        $rataRataPerbulan = $pemesanan->avg('jumlah_pesanan');

        return view('laporan.cetak-jumlah-pemesanan', compact('pemesanan', 'tanggalStart', 'tanggalEnd', 'rataRataPerbulan', 'totalPesanan', 'tahun'));
    }

    public function pendapatan()
    {
        $pendapatan = Pesanan::select(
            DB::raw('YEAR(tanggal_selesai) as tahun'),
            DB::raw('SUM(pesanans.berat_kg * pakets.harga_per_kg) as total_pendapatan')
        )
            ->join('pakets', 'pesanans.paket_id', '=', 'pakets.id')
            ->where('pesanans.status', 'Selesai')
            ->whereNotNull('pesanans.tanggal_selesai')
            ->groupBy(DB::raw('YEAR(tanggal_selesai)'))
            ->get();

        // Ambil tahun yang tersedia untuk dropdown
        $tahunTersedia = Pesanan::selectRaw('YEAR(tanggal_selesai) as tahun')
            ->where('status', 'Selesai')
            ->whereNotNull('tanggal_selesai')
            ->groupBy('tahun')
            ->orderBy('tahun', 'desc')
            ->pluck('tahun')
            ->toArray();

        return view('laporan.total-pendapatan', compact('pendapatan', 'tahunTersedia'));
    }

    public function cetakPendapatan()
    {
        $tahun = request('tahun', now()->year);

        $pendapatan = Pesanan::select(
            DB::raw('MONTH(tanggal_selesai) as bulan'),
            DB::raw('SUM(pesanans.berat_kg * pakets.harga_per_kg) as total_pendapatan')
        )
            ->join('pakets', 'pesanans.paket_id', '=', 'pakets.id')
            ->where('pesanans.status', 'Selesai')
            ->whereNotNull('pesanans.tanggal_selesai')
            ->whereYear('pesanans.tanggal_selesai', $tahun)
            ->groupBy(DB::raw('MONTH(tanggal_selesai)'))
            ->get();

        $tanggalStart = \Carbon\Carbon::createFromDate($tahun, 1, 1)->format('d/m/Y');
        $tanggalEnd = \Carbon\Carbon::createFromDate($tahun, 12, 31)->format('d/m/Y');
        $totalPendapatan = $pendapatan->sum('total_pendapatan');
        $rataRataPendapatan = $pendapatan->avg('total_pendapatan');

        return view('laporan.cetak-total-pendapatan', compact('pendapatan', 'tanggalStart', 'tanggalEnd', 'rataRataPendapatan', 'totalPendapatan', 'tahun'));
    }

    public function paketTerlaris()
    {
        $paketTerlaris = Pesanan::select(
            'paket_id',
            DB::raw('COUNT(*) as jumlah_dipesan'),
            'pakets.nama as nama'
        )
            ->groupBy('paket_id', 'pakets.nama')
            ->orderByDesc('jumlah_dipesan')
            ->join('pakets', 'pesanans.paket_id', '=', 'pakets.id')
            ->where('pesanans.status', 'Selesai')
            ->whereNotNull('pesanans.tanggal_selesai')
            ->take(5)
            ->get();

        // Ambil tahun yang tersedia untuk dropdown
        $tahunTersedia = Pesanan::selectRaw('YEAR(tanggal_selesai) as tahun')
            ->where('status', 'Selesai')
            ->whereNotNull('tanggal_selesai')
            ->groupBy('tahun')
            ->orderBy('tahun', 'desc')
            ->pluck('tahun')
            ->toArray();

        return view('laporan.paket-terlaris', compact('paketTerlaris', 'tahunTersedia'));
    }

    public function cetakTerlaris()
    {
        $tahun = request('tahun', now()->year);

        $paketTerlaris = Pesanan::select(
            'paket_id',
            DB::raw('COUNT(*) as jumlah_dipesan'),
            'pakets.nama as nama'
        )
            ->groupBy('paket_id', 'pakets.nama')
            ->orderByDesc('jumlah_dipesan')
            ->join('pakets', 'pesanans.paket_id', '=', 'pakets.id')
            ->where('pesanans.status', 'Selesai')
            ->whereNotNull('pesanans.tanggal_selesai')
            ->whereYear('pesanans.tanggal_selesai', $tahun)
            ->take(5)
            ->get();

        $tanggalStart = \Carbon\Carbon::createFromDate($tahun, 1, 1)->format('d/m/Y');
        $tanggalEnd = \Carbon\Carbon::createFromDate($tahun, 12, 31)->format('d/m/Y');
        $paketTerlaris->each(function ($item) {
            $item->nama = ucwords(strtolower($item->nama));
        });

        return view('laporan.cetak-paket-terlaris', compact('paketTerlaris', 'tanggalStart', 'tanggalEnd', 'tahun'));
    }

    public function kinerjaKasir()
    {
        $kinerjaKasir = Pesanan::select(
            'users.nama as nama_kasir',
            DB::raw('COUNT(pesanans.id) as jumlah_pesanan'),
            DB::raw('SUM(pesanans.berat_kg * pakets.harga_per_kg) as total_pendapatan')
        )
            ->join('users', 'pesanans.user_id', '=', 'users.id')
            ->join('pakets', 'pesanans.paket_id', '=', 'pakets.id')
            ->where('pesanans.status', 'Selesai')
            ->where('users.role', 'kasir')
            ->whereNotNull('pesanans.tanggal_selesai')
            ->groupBy('users.id', 'users.nama')
            ->orderByDesc('total_pendapatan')
            ->get();

        // Ambil tahun yang tersedia untuk dropdown
        $tahunTersedia = Pesanan::selectRaw('YEAR(tanggal_selesai) as tahun')
            ->join('users', 'pesanans.user_id', '=', 'users.id')
            ->where('pesanans.status', 'Selesai')
            ->where('users.role', 'kasir')
            ->whereNotNull('pesanans.tanggal_selesai')
            ->groupBy('tahun')
            ->orderBy('tahun', 'desc')
            ->pluck('tahun')
            ->toArray();

        return view('laporan.kinerja-kasir', compact('kinerjaKasir', 'tahunTersedia'));
    }

    public function cetakKinerjaKasir()
    {
        $tahun = request('tahun', now()->year);

        $kinerjaKasir = Pesanan::select(
            'users.nama as nama_kasir',
            DB::raw('COUNT(pesanans.id) as jumlah_pesanan'),
            DB::raw('SUM(pesanans.berat_kg * pakets.harga_per_kg) as total_pendapatan')
        )
            ->join('users', 'pesanans.user_id', '=', 'users.id')
            ->join('pakets', 'pesanans.paket_id', '=', 'pakets.id')
            ->where('pesanans.status', 'Selesai')
            ->where('users.role', 'kasir')
            ->whereNotNull('pesanans.tanggal_selesai')
            ->whereYear('pesanans.tanggal_selesai', $tahun)
            ->groupBy('users.id', 'users.nama')
            ->orderByDesc('total_pendapatan')
            ->get();

        $tanggalStart = \Carbon\Carbon::createFromDate($tahun, 1, 1)->format('d/m/Y');
        $tanggalEnd = \Carbon\Carbon::createFromDate($tahun, 12, 31)->format('d/m/Y');

        return view('laporan.cetak-kinerja-kasir', compact('kinerjaKasir', 'tanggalStart', 'tanggalEnd', 'tahun'));
    }
}
