<?php

namespace Database\Seeders;

use App\Models\Pakets;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('role', 'kasir')->pluck('id')->toArray();
        $pakets = Pakets::pluck('id')->toArray();
        $statuses = ['Proses', 'Selesai', 'Dibatalkan'];

        for ($i = 1; $i <= 20; $i++) {
            Pesanan::create([
                'user_id' => $users[array_rand($users)],
                'paket_id' => $pakets[array_rand($pakets)],
                'nama_pelanggan' => "Pelanggan {$i}",
                'berat_kg' => rand(1, 10),
                'tanggal_pesan' => now()->subDays(rand(1, 30)),
                'tanggal_selesai' => rand(0, 1) ? now()->addDays(rand(1, 7)) : null,
                'status' => $statuses[array_rand($statuses)],
                'catatan' => $i % 3 == 0 ? "Catatan untuk Pesanan {$i}" : null,
                // tidak boleh lebih kecil dari harga per kg * berat kg
                'bayar' => 120000,
            ]);
        }
    }
}
