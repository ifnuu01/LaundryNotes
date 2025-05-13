<?php

namespace Database\Seeders;

use App\Models\Pakets;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pakets = [
            ['nama' => 'Cuci', 'harga_per_kg' => 5000, 'status' => 'Aktif'],
            ['nama' => 'Cuci dan Keringkan', 'harga_per_kg' => 10000, 'status' => 'Aktif'],
            ['nama' => 'Keringkan', 'harga_per_kg' => 7000, 'status' => 'Aktif'],
            ['nama' => 'Setrika', 'harga_per_kg' => 8000, 'status' => 'Aktif'],
            ['nama' => 'Cuci, Keringkan, dan Setrika', 'harga_per_kg' => 15000, 'status' => 'Aktif'],
        ];

        foreach ($pakets as $paket) {
            Pakets::create($paket);
        }
    }
}
