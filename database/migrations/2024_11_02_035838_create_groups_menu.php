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
        Schema::create('groups_menu', function (Blueprint $table) {
            $table->unsignedBigInteger('id_group')->index();
            $table->unsignedBigInteger('id_menu')->index();
            $table->foreign('id_group')->references('id_group')->on('groups');
            $table->foreign('id_menu')->references('id_menu')->on('menu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups_menu');
    }
};
