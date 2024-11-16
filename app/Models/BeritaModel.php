<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaModel extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    public $timestamps = false;

    protected $fillable = [
        'penulis',
        'tanggal',
        'judul',
        'judul_eng',
        'deskripsi',
        'deskripsi_eng',
        'gambar',
        'gambar_eng'
    ];
}
