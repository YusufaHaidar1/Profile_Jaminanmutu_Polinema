<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KepuasanPelangganController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SidebarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GroupMenuController;
use App\Http\Controllers\AkreditasiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfiledetailController;
use App\Http\Controllers\MemberController;
use PHPUnit\Framework\Attributes\Group;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['cek_login:1']], function () {
        Route::group(['prefix' => 'admin'], function () {
            Route::group(['prefix' => 'group'], function () {
                Route::get('/', [GroupController::class, 'index']);
                Route::post('/list', [GroupController::class, 'list']);
                Route::get('/create', [GroupController::class, 'create']);
                Route::post('/', [GroupController::class, 'store']);
                Route::get('/{id}', [GroupController::class, 'show']);
                Route::get('/{id}/edit', [GroupController::class, 'edit']);
                Route::put('/{id}', [GroupController::class, 'update']);
                Route::delete('/{id}', [GroupController::class, 'destroy']);
            });

            Route::group(['prefix' => 'sidebar'], function () {
                Route::get('/', [SidebarController::class, 'index']);
                Route::post('/list', [SidebarController::class, 'list']);
                Route::get('/create', [SidebarController::class, 'create']);
                Route::post('/', [SidebarController::class, 'store']);
                Route::get('/{id}', [SidebarController::class, 'show']);
                Route::get('/{id}/edit', [SidebarController::class, 'edit']);
                Route::put('/{id}', [SidebarController::class, 'update']);
                Route::delete('/{id}', [SidebarController::class, 'destroy']);
            });

            Route::group(['prefix' => 'user'], function () {
                Route::get('/', [UserController::class, 'index']);
                Route::post('/list', [UserController::class, 'list']);
                Route::get('/create', [UserController::class, 'create']);
                Route::post('/', [UserController::class, 'store']);
                Route::get('/{id}', [UserController::class, 'show']);
                Route::get('/{id}/edit', [UserController::class, 'edit']);
                Route::put('/{id}', [UserController::class, 'update']);
                Route::delete('/{id}', [UserController::class, 'destroy']);
            });
        });

        Route::resource('admin', AdminController::class);
    });

    Route::group(['middleware' => ['cek_login:2']], function () {
        Route::group(['prefix' => 'member'], function () {

            Route::group(['prefix' => 'akreditasi'], function () {
                Route::get('/', [AkreditasiController::class, 'index']);
                Route::post('/list', [AkreditasiController::class, 'list']);
                Route::get('/create', [AkreditasiController::class, 'create']);
                Route::post('/', [AkreditasiController::class, 'store']);
                Route::get('/{id}', [AkreditasiController::class, 'show']);
                Route::get('/{id}/edit', [AkreditasiController::class, 'edit']);
                Route::put('/{id}', [AkreditasiController::class, 'update']);
                Route::delete('/{id}', [AkreditasiController::class, 'destroy']);
            });

            Route::group(['prefix' => 'profile'], function () {
                Route::get('/', [ProfileController::class, 'index']);
                Route::post('/list', [ProfileController::class, 'list']);
                Route::get('/create', [ProfileController::class, 'create']);
                Route::post('/', [ProfileController::class, 'store']);
                Route::get('/{id}', [ProfileController::class, 'show']);
                Route::get('/{id}/edit', [ProfileController::class, 'edit']);
                Route::put('/{id}', [ProfileController::class, 'update']);
                Route::delete('/{id}', [ProfileController::class, 'destroy']);
            });

            Route::group(['prefix' => 'profiledetail'], function () {
                Route::get('/', [ProfiledetailController::class, 'index']);
                Route::post('/list', [ProfiledetailController::class, 'list']);
                Route::get('/create', [ProfiledetailController::class, 'create']);
                Route::post('/', [ProfiledetailController::class, 'store']);
                Route::get('/{id}', [ProfiledetailController::class, 'show']);
                Route::get('/{id}/edit', [ProfiledetailController::class, 'edit']);
                Route::put('/{id}', [ProfiledetailController::class, 'update']);
                Route::delete('/{id}', [ProfiledetailController::class, 'destroy']);
            });

            Route::group(['prefix' => 'berita'], function () {
                Route::get('/', [BeritaController::class, 'index']);
                Route::post('/list', [BeritaController::class, 'list']);
                Route::get('/create', [BeritaController::class, 'create']);
                Route::post('/', [BeritaController::class, 'store']);
                Route::get('/{id}', [BeritaController::class, 'show']);
                Route::get('/{id}/edit', [BeritaController::class, 'edit']);
                Route::put('/{id}', [BeritaController::class, 'update']);
                Route::delete('/{id}', [BeritaController::class, 'destroy']);
            });

            Route::group(['prefix' => 'beranda'], function () {
                Route::get('/', [BerandaController::class, 'index']);
                Route::post('/list', [BerandaController::class, 'list']);
                Route::get('/create', [BerandaController::class, 'create']);
                Route::post('/', [BerandaController::class, 'store']);
                Route::get('/{id}', [BerandaController::class, 'show']);
                Route::get('/{id}/edit', [BerandaController::class, 'edit']);
                Route::put('/{id}', [BerandaController::class, 'update']);
                Route::delete('/{id}', [BerandaController::class, 'destroy']);
            });
        });
        Route::resource('member', MemberController::class);
    });
});


Route::get('/homepage', [HomepageController::class, 'index'])->name('home');
Route::get('/berita/{id}', [HomepageController::class, 'tampil'])->name('berita.tampil');

Route::prefix('profil')->group(function () {});

Route::get('/signin', function () {
    return view('login.signin');
})->name('signin');

Route::get('/visimisi', function () {
    return view('Profil.visi_misi');
})->name('visimisi');

Route::get('/kebijakan mutu', function () {
    return view('Profil.kebijakan_mutu');
})->name('kebijakan mutu');

Route::get('/tugas fungsi utama', function () {
    return view('Profil.tugas_fungsiutama');
})->name('tugas fungsi utama');





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
