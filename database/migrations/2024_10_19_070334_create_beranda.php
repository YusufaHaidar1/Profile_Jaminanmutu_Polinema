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
        Schema::create('beranda', function (Blueprint $table) {
            $table->id('id_beranda');
            $table->text('judul');
            $table->text('judul_eng');
            $table->text('deskripsi');
            $table->text('deskripsi_eng');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beranda');
    }
};
