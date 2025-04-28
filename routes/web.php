<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\LayananController;
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

Route::get('dashboard/pesanan',[PesananController::class, 'index'])->name('pesanan.index');
Route::get('/dashboard/pesanan/create', [PesananController::class, 'create'])->name('pesanan.create');

Route::get('/dashboard/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');

Route::get('/dashboard/layanan', [LayananController::class,'index'])->name('layanan.index');

Route::get('/dashboard/layanan/create', function () {
    return view('layanan.create');
})->name('layanan.create');

Route::get('/dashboard/layanan/edit', function () {
    return view('layanan.edit');
})->name('layanan.edit');

Route::get('/dashboard/layanan/detail', function () {
    return view('layanan.detail');
})->name('layanan.detail');


Route::get('/dashboard/pesanan/edit', function () {
    return view('pesanan.edit');
})->name('pesanan.edit');

Route::get('/dashboard/pesanan/detail', function () {
    return view('pesanan.detail');
})->name('pesanan.detail');

Route::get('/dashboard/riwayat', function () {
    return view('riwayat.list-riwayat');
})->name('riwayat.index');


Route::get('/dashboard/kasir', function () {
    return view('kasir.list-kasir');
})->name('kasir.index');

Route::get('/dashboard/kasir/create', function () {
    return view('kasir.create');
})->name('kasir.create');

Route::get('/dashboard/kasir/edit', function () {
    return view('kasir.edit');
})->name('kasir.edit');

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
