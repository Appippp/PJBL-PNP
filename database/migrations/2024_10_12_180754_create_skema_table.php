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
        Schema::create('skema', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pimpinan_id')->nullable()->index('fk_skema_to_users');
            $table->foreignId('prodi_id')->nullable()->index('fk_skema_to_prodi');
            $table->string('kode_skema')->unique();
            $table->string('nama_skema');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('tahun');
            $table->boolean('status')->default(0);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skema');
    }
};
