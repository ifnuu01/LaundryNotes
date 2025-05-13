<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\User;
use App\Models\Paket;
use App\Models\Pakets;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function index()
    {
        $data = [
            'pesanan_proses' => Pesanan::where('status', 'Proses')->count(),
            'pesanan_selesai' => Pesanan::where('status', 'Selesai')->count(),
            'pesanan_dibatalkan' => Pesanan::where('status', 'Dibatalkan')->count(),
            'total_pesanan' => Pesanan::count(),
            'jumlah_kasir' => User::where('role', 'kasir')->count(),
            'total_pendapatan' => Pesanan::where('pesanans.status', 'Selesai')
                ->join('pakets', 'pesanans.paket_id', '=', 'pakets.id')
                ->sum(DB::raw('pesanans.berat_kg * pakets.harga_per_kg')),
            'jumlah_layanan' => Pakets::count(),
        ];

        return view('beranda', compact('data'));
    }
}
