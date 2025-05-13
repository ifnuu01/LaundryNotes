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
        User::create([
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'email' => "kasir{$i}@example.com",
                'role' => 'kasir',
                'password' => Hash::make('password'),
                'nama' => "Kasir {$i}",
            ]);
        }
    }
}
