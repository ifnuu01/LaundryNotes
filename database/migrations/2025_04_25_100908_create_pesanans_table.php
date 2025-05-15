<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('paket_id')->constrained('pakets');
            $table->string('nama_pelanggan');
            $table->float('berat_kg');
            $table->float('bayar');
            $table->date('tanggal_pesan');
            $table->date('tanggal_selesai')->nullable();
            $table->enum('status', ['Proses', 'Selesai', 'Dibatalkan'])->default('Proses');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
