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
        Schema::create('my_ads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('app_id');
            $table->foreign('app_id')->references('id')->on('apps')->onDelete('cascade');
            $table->string('nativeAds')->nullable();
            $table->string('interstitialAds')->nullable();
            $table->string('bannerAds')->nullable();
            $table->string('addOpenAds')->nullable();
            $table->string('rewardedAds')->nullable();
            $table->string('app_icon')->nullable();
            $table->string('description')->nullable();
            $table->string('link')->nullable();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_ads');
    }
};
