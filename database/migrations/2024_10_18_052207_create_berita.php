<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id('id_berita',11);
            $table->string('penulis');
            $table->date('tanggal')->nullable();
            $table->string('judul')->nullable()->default('NULL');
            $table->string('judul_eng')->nullable()->default('NULL');
            $table->text('deskripsi')->nullable();
            $table->text('deskripsi_eng')->nullable();
            $table->text('gambar')->nullable();
            $table->text('gambar_eng');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
