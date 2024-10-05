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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index('fk_dosen_to_users');
            $table->foreignId('prodi_id')->nullable()->index('fk_dosen_to_prodi');
            $table->string('nidn')->unique();
            $table->string('nama_dosen');
            $table->string('no_telp');
            $table->enum('jk', [1,2]);
            $table->longText('alamat')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
