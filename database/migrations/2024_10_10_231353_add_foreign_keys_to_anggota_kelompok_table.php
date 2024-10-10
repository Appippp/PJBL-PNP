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
            $table->foreign('kelompok_id', 'fk_anggota_kelompok_to_kelompok')->references('id')->on('kelompok')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('anggota_id', 'fk_anggota_kelompok_to_mahasiswa')->references('id')->on('mahasiswa')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anggota_kelompok', function (Blueprint $table) {
            $table->dropForeign('fk_anggota_kelompok_to_kelompok');
            $table->dropForeign('fk_anggota_kelompok_to_mahasiswa');
        });
    }
};
