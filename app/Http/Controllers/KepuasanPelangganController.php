<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KepuasanPelangganController extends Controller
{
    public function mahasiswa()
    {
        return view('Pelayanan.Kepuasan Pelanggan.mahasiswa');
    }

    public function orangtua()
    {
        return view('Pelayanan.Kepuasan Pelanggan.orangtua');
    }

    public function dosenstaff()
    {
        return view('Pelayanan.Kepuasan Pelanggan.dosenstaff');
    }

    public function mitra()
    {
        return view('Pelayanan.Kepuasan Pelanggan.mitra');
    }

    public function alumni()
    {
        return view('Pelayanan.Kepuasan Pelanggan.alumni');
    }
}
