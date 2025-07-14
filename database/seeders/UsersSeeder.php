<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        User::create([
            'nama' => 'Administrator',
            'email' => 'admin@laundrynotes.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        $kasirData = [
            ['nama' => 'Siti Nurhaliza', 'email' => 'siti.nurhaliza@laundrynotes.com'],
            ['nama' => 'Ahmad Fauzi', 'email' => 'ahmad.fauzi@laundrynotes.com'],
            ['nama' => 'Dewi Sartika', 'email' => 'dewi.sartika@laundrynotes.com'],
            ['nama' => 'Budi Santoso', 'email' => 'budi.santoso@laundrynotes.com'],
            ['nama' => 'Rina Kusumawati', 'email' => 'rina.kusumawati@laundrynotes.com'],
            ['nama' => 'Joko Widodo', 'email' => 'joko.widodo@laundrynotes.com'],
            ['nama' => 'Maya Sari', 'email' => 'maya.sari@laundrynotes.com'],
        ];

        foreach ($kasirData as $kasir) {
            User::create([
                'nama' => $kasir['nama'],
                'email' => $kasir['email'],
                'password' => Hash::make('password123'),
                'role' => 'kasir',
            ]);
        }
    }
}
