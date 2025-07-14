<?php

namespace Database\Seeders;

use App\Models\Pakets;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('role', 'kasir')->pluck('id')->toArray();
        $pakets = Pakets::all();
        $statuses = ['Proses', 'Selesai', 'Dibatalkan'];

        $namaPelanggan = [
            'Samsul Bahri',
            'Rahmat Hidayat',
            'Siti Aminah',
            'Budi Prasetyo',
            'Dewi Kartika',
            'Ahmad Rizki',
            'Nur Fadhilah',
            'Agus Salim',
            'Evi Susanti',
            'Dedi Kurniawan',
            'Wati Rahayu',
            'Hendra Wijaya',
            'Lina Marlina',
            'Tono Sugiarto',
            'Sri Mulyani',
            'Andi Setiawan',
            'Rina Anggraini',
            'Bambang Sutrisno',
            'Yuni Astuti',
            'Irwan Saputra',
            'Sari Indah',
            'Dono Prakoso',
            'Fitri Handayani',
            'Rudi Hartono',
            'Mega Wulandari',
            'Joni Iskandar',
            'Rini Sulistyo',
            'Hasan Abdullah',
            'Tuti Herawati',
            'Eko Purnomo',
            'Lilis Suryani',
            'Didik Setiadi',
            'Yayah Rukayah',
            'Adi Nugroho',
            'Nina Sari',
            'Asep Saepudin',
            'Ika Setiani',
            'Yanto Subagyo',
            'Ratna Sari',
            'Dian Pratama',
            'Slamet Riyadi',
            'Umi Kulsum',
            'Wahyu Nugraha',
            'Endang Susilowati',
            'Teguh Santoso',
            'Nining Sumarni',
            'Jajang Nurjaman',
            'Ida Farida',
            'Cecep Suherman',
            'Neneng Nuraeni'
        ];


        $catatanOptions = [
            null,
            'Pakaian anak, harap hati-hati',
            'Ada noda membandel di baju putih',
            'Jangan dicampur dengan warna lain',
            'Setrika rapi untuk acara kantor',
            'Cuci dengan deterjen khusus',
            'Pakaian seragam sekolah',
            'Baju kerja, mohon diutamakan',
            'Cuci terpisah karena bahan silk',
            'Segera dikerjakan, butuh besok',
            'Dry clean saja untuk jas',
            'Pakaian olahraga, extra pembersihan'
        ];

        $pesananData = [];


        for ($tahun = 2023; $tahun <= 2025; $tahun++) {
            for ($bulan = 1; $bulan <= 12; $bulan++) {

                if ($tahun == 2025 && $bulan > 7) continue;


                $jumlahPesanan = rand(4, 15);

                for ($i = 0; $i < $jumlahPesanan; $i++) {
                    $paket = $pakets->random();
                    $beratKg = rand(1, 12);
                    $hargaTotal = $paket->harga_per_kg * $beratKg;


                    $randomStatusChance = rand(1, 100);
                    if ($randomStatusChance <= 70) {
                        $status = 'Selesai';
                    } elseif ($randomStatusChance <= 90) {
                        $status = 'Proses';
                    } else {
                        $status = 'Dibatalkan';
                    }


                    $tanggalPesan = Carbon::create($tahun, $bulan, rand(1, 28))->addHours(rand(8, 18))->addMinutes(rand(0, 59));


                    $tanggalSelesai = null;
                    if ($status == 'Selesai') {
                        $tanggalSelesai = $tanggalPesan->copy()->addDays(rand(1, 5));
                    } elseif ($status == 'Dibatalkan') {
                        $tanggalSelesai = $tanggalPesan->copy()->addDays(rand(0, 2));
                    }


                    if ($status == 'Selesai') {
                        $bayar = $hargaTotal + rand(0, 50000);
                    } elseif ($status == 'Proses') {
                        $bayar = $hargaTotal;
                    } else {
                        $bayar = rand(0, $hargaTotal);
                    }

                    $pesananData[] = [
                        'user_id' => $users[array_rand($users)],
                        'paket_id' => $paket->id,
                        'nama_pelanggan' => $namaPelanggan[array_rand($namaPelanggan)],
                        'berat_kg' => $beratKg,
                        'tanggal_pesan' => $tanggalPesan->toDateString(),
                        'tanggal_selesai' => $tanggalSelesai ? $tanggalSelesai->toDateString() : null,
                        'status' => $status,
                        'catatan' => rand(1, 100) <= 30 ? $catatanOptions[array_rand($catatanOptions)] : null,
                        'bayar' => $bayar,
                        'created_at' => $tanggalPesan,
                        'updated_at' => $tanggalSelesai ?? $tanggalPesan,
                    ];
                }
            }
        }


        foreach (array_chunk($pesananData, 50) as $chunk) {
            Pesanan::insert($chunk);
        }
    }
}
