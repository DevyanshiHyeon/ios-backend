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
        Schema::create('apps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('bundle_id');
            $table->json('app_list')->nullable();
            $table->string('app_icon')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->string('link')->nullable();
            $table->string('title')->nullable();
            $table->boolean('is_ad_on')->default(false);
            $table->boolean('is_custom_ads_on')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apps');
    }
};
