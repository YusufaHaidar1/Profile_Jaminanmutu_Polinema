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
        Schema::create('sidebar_menu', function (Blueprint $table) {
            $table->id('id_menu');
            $table->integer('level');
            $table->integer('parent_id')->nullable();
            $table->string('label');
            $table->string('link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sidebar_menu');
    }
};
