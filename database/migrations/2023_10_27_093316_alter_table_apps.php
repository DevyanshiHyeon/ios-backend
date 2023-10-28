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
        Schema::table('apps', function (Blueprint $table) {
            $table->decimal('force_update_version', 8, 2)->nullable();
            $table->decimal('live_version', 8, 2)->nullable();
            $table->integer('intertial_gap_count')->nullable();
            $table->integer('intertial_initial_count')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apps', function (Blueprint $table) {
            $table->dropColumn(['force_update_version','live_version','intertial_gap_count','intertial_initial_count']);
        });
    }
};
