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
        Schema::table('skema', function (Blueprint $table) {
            $table->foreign('pimpinan_id', 'fk_skema_to_users')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('prodi_id', 'fk_skema_to_prodi')->references('id')->on('prodi')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('skema', function (Blueprint $table) {
            $table->dropForeign('fk_skema_to_users');
            $table->dropForeign('fk_skema_to_prodi');
        });
    }
};
