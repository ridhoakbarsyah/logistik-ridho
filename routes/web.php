<?php

use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\StokBarangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('barang-masuk', [BarangMasukController::class, 'index'])->name('barang-masuk.index');
Route::get('barang-masuk/create', [BarangMasukController::class, 'create'])->name('barang-masuk.create');
Route::post('barang-masuk', [BarangMasukController::class, 'store'])->name('barang-masuk.store');


Route::get('/barang-keluar', [BarangKeluarController::class, 'index']);
Route::get('/barang-keluar/create', [BarangKeluarController::class, 'create']);
Route::post('/barang-keluar', [BarangKeluarController::class, 'store']);

Route::get('/stok-barang', [StokBarangController::class, 'index']);
