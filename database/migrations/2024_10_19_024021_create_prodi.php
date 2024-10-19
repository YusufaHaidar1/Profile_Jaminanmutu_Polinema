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
        Schema::create('prodi', function (Blueprint $table) {
            $table->id('id_prodi', 16);
            $table->unsignedBigInteger('id_jurusan', 16)->index();
            $table->string('nama_prodi');
            $table->foreign('id_jurusan')->references('id_jurusan')->on('jurusan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodi');
    }
};
