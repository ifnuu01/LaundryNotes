<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans';
    protected $fillable = [
        'user_id',
        'paket_id',
        'nama_pelanggan',
        'berat_kg',
        'tanggal_pesan',
        'tanggal_selesai',
        'status',
        'catatan',
        'bayar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
    public function paket()
    {
        return $this->belongsTo(Pakets::class)->withTrashed();
    }
}
