<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeritaModel;

class HomepageController extends Controller
{
    public function index()
    {
        // Fetch all berita (news articles)
        $beritas = BeritaModel::all();

        $berita = BeritaModel::orderBy('id_berita', 'desc')->first();
        
        // Return the homepage view with the berita data
        return view('Beranda.homepage', compact('beritas', 'berita')); // Assuming 'index' is your homepage view
    }

    public function tampil($id){      
        $berita = BeritaModel::findOrFail($id);

    // Return the berita view and pass the berita data to the view
    return view('Beranda.berita', compact('berita'));
    }
}
