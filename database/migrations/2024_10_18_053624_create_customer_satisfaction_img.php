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
        Schema::create('customer_satisfaction_img', function (Blueprint $table) {
            $table->id('id_cust_img',11);
            $table->string('kategori',50)->nullable()->default('NULL');
            $table->date('tahun');
            $table->text('gambar')->nullable()->default('NULL');
            $table->text('gambar_eng');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_satisfaction_img');
    }
};
