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
        Schema::create('validasi_proposal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proposal_id')->nullable()->index('fk_validasi_proposal_to_proposal');
            $table->foreignId('mitra_id')->nullable()->index('fk_validasi_proposal_to_mitra');
            $table->foreignId('anggota_id')->nullable()->index('fk_validasi_proposal_to_anggota_kelompok');
            $table->foreignId('dospem_d')->nullable()->index('fk_validasi_proposal_to_dospem');
            $table->enum('validasi_dospem', ['belum diproses', 'disetujui', 'revisi'])->default('belum diproses');
            $table->enum('validasi_pimpinan', ['belum diproses', 'disetujui', 'revisi'])->default('belum diproses');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validasi_proposal');
    }
};
