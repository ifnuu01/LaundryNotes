<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/dashboard/pesanan', function () {
    return view('pesanan.list-pesanan');
});

Route::get('/dashboard/pesanan/create', function () {
    return view('pesanan.create');
});

Route::get('/dashboard/pesanan/edit', function () {
    return view('pesanan.edit');
});

Route::get('/dashboard/pesanan/detail', function () {
    return view('pesanan.detail');
});

Route::get('/dashboard/layanan', function () {
    return view('layanan.list-layanan');
});

Route::get('/dashboard/layanan/create', function () {
    return view('layanan.create');
});

Route::get('/dashboard/layanan/edit', function () {
    return view('layanan.edit');
});

Route::get('/dashboard/layanan/detail', function () {
    return view('layanan.detail');
});

Route::get('/dashboard/kasir', function () {
    return view('kasir.list-kasir');
});

Route::get('/dashboard/kasir/create', function () {
    return view('kasir.create');
});

Route::get('/dashboard/kasir/edit', function () {
    return view('kasir.edit');
});

Route::get('/dashboard/jumlah-pemesanan', function () {
    return view('laporan.jumlah-pemesanan');
});
Route::get('/dashboard/kinerja-kasir', function () {
    return view('laporan.kinerja-kasir');
});
Route::get('/dashboard/paket-terlaris', function () {
    return view('laporan.paket-terlaris');
});
Route::get('/dashboard/total-pendapatan', function () {
    return view('laporan.total-pendapatan');
});
