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
        Schema::table('sidebar_menu', function (Blueprint $table) {
            $table->unsignedBigInteger('id_group')->index()->nullable()->after('id_menu');
            $table->foreign('id_group')->references('id_group')->on('groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sidebar_menu', function (Blueprint $table) {
            $table->dropForeign(['id_group']);
            $table->dropColumn('id_group');
        });
    }
};
