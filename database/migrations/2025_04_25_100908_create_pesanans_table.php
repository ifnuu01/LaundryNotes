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
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('layanan_id')->constrained('pakets')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_pelanggan');
            $table->float('berat_kg');
            $table->date('tanggal_pesan');
            $table->date('tanggal_selesai')->nullable();
            $table->enum('status', ['proses', 'selesai']);
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
