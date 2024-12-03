<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PeminjamanController;
use Database\Factories\PeminjamanFactory;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/barang', [BarangController::class, 'index'])->name('barang');
Route::post('/tambah_barang', [BarangController::class, 'store'])->name('tambahBarang');
Route::post('/hapus_barang/{id_barang}', [BarangController::class, 'destroy'])->name('hapusBarang');
Route::get('/edit_barang/{id_barang}', [BarangController::class, 'edit'])->name('editBarang');
Route::put('/edit_barang', [BarangController::class, 'update'])->name('edit');

Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman');
Route::get('/tambah_peminjaman/{id_barang}', [PeminjamanController::class, 'create'])->name('peminjamanTambah');
Route::post('/tambah_peminjaman', [PeminjamanController::class, 'store'])->name('tambahPeminjaman');
Route::post('/hapus_peminjaman/{id_peminjaman}', [PeminjamanController::class, 'destroy'])->name('hapusPeminjaman');
Route::get('/halaman_edit_peminjaman/{id_peminjaman}', [PeminjamanController::class, 'edit'])->name('halamanEditPeminjaman');
Route::post('/edit_peminjaman', [PeminjamanController::class, 'update'])->name('editPeminjaman');