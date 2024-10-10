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
        Schema::table('dosen_pembimbing', function (Blueprint $table) {
            $table->foreign('proposal_id', 'fk_dosen_pembimbing_to_proposal')->references('id')->on('proposal')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('dosen_id', 'fk_dosen_pembimbing_to_dosen')->references('id')->on('dosen')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dosen_pembimbing', function (Blueprint $table) {
            $table->dropForeign('fk_dosen_pembimbing_to_proposal');
            $table->dropForeign('fk_dosen_pembimbing_to_dosen');
        });
    }
};
