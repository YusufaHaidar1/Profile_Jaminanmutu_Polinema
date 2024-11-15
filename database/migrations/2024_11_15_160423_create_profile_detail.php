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
        Schema::create('profile_detail', function (Blueprint $table) {
            $table->id('id_detail_profile');
            $table->unsignedBigInteger('id_profile')->index();
            $table->string('jenis');
            $table->string('jenis_eng');
            $table->string('detail_profile');
            $table->string('detail_profile_eng');
            $table->foreign('id_profile')->references('id_profile')->on('profile');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_detail');
    }
};
