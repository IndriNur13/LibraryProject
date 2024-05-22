<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PengelolaController;
use App\Http\Controllers\PinjamBukuController;
use App\Models\Kategori;
use App\Models\Penerbit;
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

Route::middleware('auth')->group(function () {


    Route::get('/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('/tambahkategori', [KategoriController::class, 'kategori']);
    Route::get('/indexkategori', [KategoriController::class, 'lihatdata'])->middleware('auth');
    Route::get('/kategoris', [KategoriController::class, 'kategori']);
    Route::post('/kategori', [KategoriController::class, 'kategorie']);
    Route::get('/lihatkategori', [KategoriController::class, 'lihatdata']);
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit']);
    Route::get('/kategori/hapus/{id}', [KategoriController::class, 'hapus']);
    Route::post('/ubahkategori/{id}', [KategoriController::class, 'ubah']);

    Route::get('/indexpenerbit', [PenerbitController::class, 'lihatdatapenerbit']);
    Route::get('/tambahpenerbit', [PenerbitController::class, 'halpenerbit']);
    Route::get('/halpenerbit', [PenerbitController::class, 'halpenerbit']);
    Route::post('/penerbit', [PenerbitController::class, 'penerbit']);
    Route::get('/lihatpenerbit', [PenerbitController::class, 'lihatdatapenerbit']);
    Route::get('/penerbit/edit/{id}', [PenerbitController::class, 'edit']);
    Route::post('/ubahpenerbit/{id}', [PenerbitController::class, 'ubah']);
    Route::get('/penerbit/hapus/{id}', [PenerbitController::class, 'hapus']);

    Route::get('/indexpengelola', [PengelolaController::class, 'indexpengelola']);
    Route::get('/tambahpengelola', [PengelolaController::class, 'tambah']);
    Route::post('/pengelola', [PengelolaController::class, 'pengelola']);
    Route::get('/pengelola/edit/{id}', [PengelolaController::class, 'edit']);
    Route::post('/ubahpengelola/{id}', [PengelolaController::class, 'ubah']);
    Route::get('/pengelola/hapus/{id}', [PengelolaController::class, 'hapus']);

    Route::get('/indexpeminjam', [PeminjamController::class, 'indexpeminjam']);
    Route::get('/tambahpeminjam', [PeminjamController::class, 'halpeminjam']);
    Route::post('/peminjam', [PeminjamController::class, 'peminjam']);
    Route::get('/peminjam/edit/{id}', [PeminjamController::class, 'edit']);
    Route::post('/ubahpeminjam/{id}', [PeminjamController::class, 'ubah']);
    Route::get('/peminjam/hapus/{id}', [PeminjamController::class, 'hapus']);

    Route::get('/buku', [BukuController::class, 'bukuu']);
    Route::post('/buku', [BukuController::class, 'buku']);
    Route::get('/tambahbuku', [BukuController::class, 'bukuu']);
    Route::get('/indexbuku', [BukuController::class, 'lihatdatabuku']);
    Route::get('/lihatdatabuku', [BukuController::class, 'lihatdatabuku']);
    Route::get('/buku/edit/{id}', [BukuController::class, 'edit']);
    Route::post('/ubahbuku/{id}', [BukuController::class, 'ubah']);
    Route::get('/buku/hapus/{id}', [BukuController::class, 'hapus']);

    Route::get('/indexpinjambuku', [PinjamBukuController::class, 'index']);
    Route::get('/tambahpinjaman', [PinjamBukuController::class, 'tambahpeminjaman']);
    Route::post('/simpantransaksi', [PinjamBukuController::class, 'simpantransaksi']);

    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::get('/index', [AuthController::class, 'index2'])->name('login');
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registered']);

Route::post('/ceklogin', [AuthController::class, 'ceklogin']);
