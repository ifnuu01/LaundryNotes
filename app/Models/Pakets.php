<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pakets extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pakets';

    protected $fillable = [
        'nama',
        'catatan',
        'harga_per_kg',
        'status',
    ];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }
}
