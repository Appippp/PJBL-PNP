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
        Schema::create('detail_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index('fk_detail_user_to_users');
            $table->foreignId('type_user_id')->nullable()->index('fk_detail_user_to_type_user');
            $table->foreignId('prodi_id')->nullable()->index('fk_detail_user_to_prodi');
            $table->string('tahun_masuk')->nullable();
            $table->string('no_telp')->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_user');
    }
};
