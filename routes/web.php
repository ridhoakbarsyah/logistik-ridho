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


Route::prefix('barang-keluar')->name('barang-keluar.')->group(function () {
    Route::get('/', [BarangKeluarController::class, 'index'])->name('index');
    Route::get('/create', [BarangKeluarController::class, 'create'])->name('create');
    Route::post('/', [BarangKeluarController::class, 'store'])->name('store');
});

Route::get('/stok-barang', [StokBarangController::class, 'index']);
