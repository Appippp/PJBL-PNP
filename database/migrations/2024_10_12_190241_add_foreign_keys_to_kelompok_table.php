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
            $table->foreign('proposal_id', 'fk_kelompok_to_proposal')->references('id')->on('proposal')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ketua_id', 'fk_kelompok_to_users')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kelompok', function (Blueprint $table) {
            $table->dropForeign('fk_kelompok_to_proposal');
            $table->dropForeign('fk_kelompok_to_users');
        });
    }
};
