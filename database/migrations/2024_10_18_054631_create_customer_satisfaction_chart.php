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
        Schema::create('customer_satisfaction_chart', function (Blueprint $table) {
            $table->integer('id',11);
            $table->string('kategori',50)->nullable()->default('NULL');
            $table->date('tahun');

            $table->float('u1', 5, 2)->nullable();
            $table->float('u2', 5, 2)->nullable();
            $table->float('u3', 5, 2)->nullable();
            $table->float('u4', 5, 2)->nullable();
            $table->float('u5', 5, 2)->nullable();
            $table->float('u6', 5, 2)->nullable();
            $table->float('u7', 5, 2)->nullable();
            $table->float('u8', 5, 2)->nullable();
            $table->float('u9', 5, 2)->nullable();
            $table->float('u10', 5, 2)->nullable();
            $table->float('u11', 5, 2)->nullable();
            $table->float('u12', 5, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_satisfaction_chart');
    }
};
