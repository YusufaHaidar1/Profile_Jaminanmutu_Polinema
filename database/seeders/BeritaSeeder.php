<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_berita' => 1,
                'penulis' => 'Admin',
                'tanggal' => now(),
                'judul' => 'Placeholder (Ganti / Hapus Jika Perlu)',
                'judul_eng' => 'Placeholder (Ganti / Hapus Jika Perlu)',
                'deskripsi' => 'Placeholder (Ganti / Hapus Jika Perlu)',
                'deskripsi_eng' => 'Placeholder (Ganti / Hapus Jika Perlu)',
                'gambar' => 'assets/img/berita/1731851602_Screenshot (132).png',
                'gambar_eng' => 'assets/img/berita/1731851602_Screenshot (132).png',
            ],
        ];
        DB::table('berita')->insert($data);
    }
}
