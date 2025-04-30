<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\UsersController;

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

Route::resource('/', WelcomeController::class);

Route::get('/login', [AuthController::class, 'index'])->name("login");
Route::post('/login-proses', [AuthController::class, 'loginProses'])->name("login-proses");

// pake resouce untuk CRUD
Route::resource('dashboard/pesanan', PesananController::class);
Route::resource('dashboard/riwayat', RiwayatController::class);
Route::resource('dashboard/layanan', PaketController::class);

// User maksudnya Buat CRUD Kasir
Route::resource('dashboard/kasir', UsersController::class);

Route::get('/dashboard/jumlah-pemesanan', function () {
    return view('laporan.jumlah-pemesanan');
})->name('laporan.pemesanan');

Route::get('/dashboard/kinerja-kasir', function () {
    return view('laporan.kinerja-kasir');
})->name('laporan.kasir');

Route::get('/dashboard/paket-terlaris', function () {
    return view('laporan.paket-terlaris');
})->name('laporan.terlaris');

Route::get('/dashboard/total-pendapatan', function () {
    return view('laporan.total-pendapatan');
})->name('laporan.pendapatan');
