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

Route::get('/berita1', function () {
    return view('Beranda.berita1');
});

Route::get('/SPMI', function () {
    return view('SPMI.standar');
});

Route::get('/test', function () {
    return view('SPMI.test');
});