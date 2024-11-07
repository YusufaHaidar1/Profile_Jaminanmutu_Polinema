<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KepuasanPelangganController;
use App\Http\Controllers\GroupController;
use PHPUnit\Framework\Attributes\Group;

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
    Route::get('/student', [KepuasanPelangganController::class, 'student'])->name('kepuasanpelanggan.student');
});

Route::group(['prefix' => 'admin'], function(){
    Route::group(['prefix' => 'group'], function(){
        Route::get('/', [GroupController::class, 'index']);
        Route::post('/list', [GroupController::class, 'list']);
        Route::get('/create', [GroupController::class, 'create']);
        Route::post('/', [GroupController::class,'store']);
        Route::get('/{id}', [GroupController::class, 'show']);
        Route::get('/{id}/edit', [GroupController::class, 'edit']);
        Route::put('/{id}', [GroupController::class, 'update']);
        Route::delete('/{id}', [GroupController::class, 'destroy']);
    });
});

Route::prefix('profil')->group(function () {});

Route::get('/signin', function () {
    return view('login.signin');
})->name('signin');

Route::get('/homepage', function () {
    return view('Beranda.homepage');
})->name('homepage');

Route::get('/visimisi', function () {
    return view('Profil.visi_misi');
})->name('visimisi');

Route::get('/kebijakan mutu', function () {
    return view('Profil.kebijakan_mutu');
})->name('kebijakan mutu');

Route::get('/tugas fungsi utama', function () {
    return view('Profil.tugas_fungsiutama');
})->name('tugas fungsi utama');



Route::get('/berita1', function () {
    return view('Beranda.berita1');
})->name('berita');

Route::get('/standarkualitas', function () {
    return view('SPMI.standar');
})->name('standar');

Route::get('/SPMI', function () {
    return view('SPMI.SPMI');
})->name('SPMI');

Route::get('/Program', function () {
    return view('Akreditasi.prostud');
})->name('program');

Route::get('/Akreditasi', function () {
    return view('Akreditasi.akreditasi');
})->name('akreditasi');

Route::get('/test', function () {
    return view('SPMI.test');
});
