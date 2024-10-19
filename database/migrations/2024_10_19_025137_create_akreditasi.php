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
        Schema::create('akreditasi', function (Blueprint $table) {
            $table->id('id_akreditasi');
            $table->enum('jenjang', ['institusi', 'program studi D-III', 'program studi D-IV', 'program studi S2']);
            $table->string('sk');
            $table->string('nama');
            $table->string('nama_eng');
            $table->string('skor');
            $table->string('masa_berlaku');
            $table->text('dokumen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akreditasi');
    }
};
