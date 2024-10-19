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
        Schema::create('jurusan', function (Blueprint $table) {
            $table->id('id_jurusan', 16);
            $table->string('nama_jurusan');
            $table->enum('aktif', ['ya', 'tidak']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurusan');
    }
};
