<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KepuasanPelangganController;

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

Route::prefix('kepuasanpelanggan')->group(function () {
    Route::get('/mahasiswa', [KepuasanPelangganController::class, 'mahasiswa'])->name('kepuasanpelanggan.mahasiswa');
    Route::get('/orangtua', [KepuasanPelangganController::class, 'orangtua'])->name('kepuasanpelanggan.orangtua');
    Route::get('/dosenstaff', [KepuasanPelangganController::class, 'dosenstaff'])->name('kepuasanpelanggan.dosenstaff');
    Route::get('/mitra', [KepuasanPelangganController::class, 'mitra'])->name('kepuasanpelanggan.mitra');
    Route::get('/alumni', [KepuasanPelangganController::class, 'alumni'])->name('kepuasanpelanggan.alumni');
});

Route::get('/signin', function () {
    return view('login.signin');
});

Route::get('/berita1', function () {
    return view('Beranda.berita1');
});

Route::get('/SPMI', function () {
    return view('SPMI.standar');
});

Route::get('/test', function () {
    return view('SPMI.test');
});