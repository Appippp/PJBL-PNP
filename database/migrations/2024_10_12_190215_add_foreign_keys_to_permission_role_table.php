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
        Schema::table('permission_role', function (Blueprint $table) {
            $table->foreign('permission_id', 'fk_permission_role_to_permission')->references('id')->on('permission')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id', 'fk_permission_role_to_role')->references('id')->on('role')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permission_role', function (Blueprint $table) {
            $table->dropForeign('fk_permission_role_to_permission');
            $table->dropForeign('fk_permission_role_to_role');
        });
    }
};
