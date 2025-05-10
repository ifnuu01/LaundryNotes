<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;

class TransaksiController extends Controller
{
    public function cetakStruk($id)
    {
        $pesanan = Pesanan::with(['detail_pesanan.paket', 'kasir'])->findOrFail($id);

        return view('transaksi.struk', compact('pesanan'));
    }
}