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
        Schema::create('detail_proposal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proposal_id')->nullable()->index('fk_detail_proposal_to_proposal');
            $table->foreignId('dospem_id')->nullable()->index('fk_detail_proposal_to_dosen_pembimbing');
            $table->foreignId('kaprodi_id')->nullable()->index('fk_detail_proposal_to_kaprodi');
            $table->foreignId('mitra_id')->nullable()->index('fk_detail_proposal_to_mitra');
            $table->foreignId('kelompok_id')->nullable()->index('fk_detail_proposal_to_anggota_kelompok');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_proposal');
    }
};
