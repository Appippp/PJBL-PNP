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
        Schema::create('dosen_pembimbing', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proposal_id')->nullable()->index('fk_dosen_pembimbing_to_proposal');
            $table->foreignId('dosen_id')->nullable()->index('fk_dosen_pembimbing_to_dosen');
            $table->enum('validasi_dospem', ['revisi', 'disetujui', 'belum diproses'])->default('belum diproses');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen_pembimbing');
    }
};
