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

        // Get the next and previous berita based on the created_at column
        $berita->next = BeritaModel::where('id_berita', '>', $berita->id_berita)
            ->orderBy('id_berita')
            ->first(); // Get the next berita

        $berita->prev = BeritaModel::where('id_berita', '<', $berita->id_berita)
            ->orderBy('id_berita', 'desc')
            ->first(); // Get the previous berita
        
        // Return the homepage view with the berita data
        return view('Beranda.homepage', compact('beritas', 'berita')); // Assuming 'index' is your homepage view
    }

    public function tampil($id){      
        $berita = BeritaModel::findOrFail($id);

    // Return the berita view and pass the berita data to the view
    return view('Beranda.berita', compact('berita'));
    }
}
