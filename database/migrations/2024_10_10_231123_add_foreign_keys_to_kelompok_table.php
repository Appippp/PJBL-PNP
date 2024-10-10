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
        Schema::table('kelompok', function (Blueprint $table) {
            $table->foreign('proposal_id', 'fk_kelompok_to_proposal')->references('id')->on('proposal')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('ketua_id', 'fk_kelompok_to_mahasiswa')->references('id')->on('mahasiswa')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kelompok', function (Blueprint $table) {
            $table->dropForeign('fk_kelompok_to_proposal');
            $table->dropForeign('fk_kelompok_to_mahasiswa');
        });
    }
};
