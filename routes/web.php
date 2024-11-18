<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\PinjamBarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/home', HomeController::class);
Route::resource('barang', BarangController::class);
Route::resource('supplier', SupplierController::class);
Route::resource('stok', StokController::class);
Route::post('stok/barang-masuk', [StokController::class, 'barangMasuk'])->name('stok.barang-masuk');
Route::post('stok/barang-keluar', [StokController::class, 'barangKeluar'])->name('stok.barang-keluar');
Route::post('stok/pinjam-barang', [StokController::class, 'pinjamBarang'])->name('stok.pinjam-barang');
Route::resource('pinjam_barang', PinjamBarangController::class);
Route::resource('barang_keluar', BarangKeluarController::class);
Route::resource('barang_masuk', BarangMasukController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
