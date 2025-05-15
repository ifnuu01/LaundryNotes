<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\UsersController;

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware(['auth', 'role:admin,kasir'])->group(function () {
    Route::get('/dashboard', [BerandaController::class, 'index'])->name('dashboard');
    Route::resource('dashboard/pesanan', PesananController::class);
    Route::resource('dashboard/riwayat', RiwayatController::class);
    Route::get('/pesanan/{id}/cetak', [PesananController::class, 'cetak'])->name('pesanan.cetak');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('dashboard/kasir', UsersController::class);
    Route::resource('dashboard/layanan', PaketController::class);
    Route::get('/dashboard/laporan/cetak-pemesanan', [LaporanController::class, 'cetakPemesanan'])->name('laporan.cetak-pemesanan');
    Route::get('/dashboard/laporan/cetak-pendapatan', [LaporanController::class, 'cetakPendapatan'])->name('laporan.cetak-pendapatan');
    Route::get('/dashboard/laporan/cetak-kinerja-kasir', [LaporanController::class, 'cetakKinerjaKasir'])->name('laporan.cetak-kinerja-kasir');
    Route::get('/dashboard/laporan/cetak-paket-terlaris', [LaporanController::class, 'cetakTerlaris'])->name('laporan.cetak-paket-terlaris');
    Route::get('/transaksi/struk/{id}', [TransaksiController::class, 'cetakStruk']);



    Route::get('/dashboard/jumlah-pemesanan', [LaporanController::class, 'pemesanan'])->name('laporan.pemesanan');
    // Route::get('/dashboard/jumlah-pemesanan', function () {
    //     return view('laporan.jumlah-pemesanan');
    // })->name('laporan.pemesanan');
    Route::get('/dashboard/laporan/pemesanan', [LaporanController::class, 'printPemesanan'])->name('laporan.print-pemesanan');

    Route::get('/dashboard/kinerja-kasir', [LaporanController::class, 'kinerjaKasir'])->name('laporan.kasir');

    Route::get('/dashboard/paket-terlaris', [LaporanController::class, 'paketTerlaris'])->name('laporan.terlaris');
    // Route::get('/dashboard/paket-terlaris', function () {
    //     return view('laporan.paket-terlaris');
    // })->name('laporan.terlaris');

    // route::get('/dashboard/total-pendapatan', function () {
    //     return view('laporan.total-pendapatan');
    // })->name('laporan.pendapatan');

    Route::get('/dashboard/total-pendapatan', [LaporanController::class, 'pendapatan'])->name('laporan.pendapatan');
});

Route::middleware(['guest'])->group(function () {
    Route::resource('/', WelcomeController::class);
    Route::get('/login', [AuthController::class, 'index'])->name("login");
    Route::post('/login-proses', [AuthController::class, 'loginProses'])->name("login-proses");
});
