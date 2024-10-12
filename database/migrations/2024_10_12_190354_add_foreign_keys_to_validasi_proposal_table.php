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
        Schema::table('validasi_proposal', function (Blueprint $table) {
            $table->foreign('proposal_id', 'fk_validasi_proposal_to_proposal')->references('id')->on('proposal')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('mitra_id', 'fk_validasi_proposal_to_mitra')->references('id')->on('mitra')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('anggota_id', 'fk_validasi_proposal_to_anggota_kelompok')->references('id')->on('anggota_kelompok')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('dospem_d', 'fk_validasi_proposal_to_dospem')->references('id')->on('dosen_pembimbing')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('validasi_proposal', function (Blueprint $table) {
            //
        });
    }
};
