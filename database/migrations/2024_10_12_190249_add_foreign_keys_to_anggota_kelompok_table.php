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
        Schema::table('anggota_kelompok', function (Blueprint $table) {
            $table->foreign('kelompok_id', 'fk_anggota_kelompok_to_kelompok')->references('id')->on('kelompok')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('anggota_id', 'fk_anggota_kelompok_to_users')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anggota_kelompok', function (Blueprint $table) {
            $table->dropForeign('fk_anggota_kelompok_to_kelompok');
            $table->dropForeign('fk_anggota_kelompok_to_users');
        });
    }
};
