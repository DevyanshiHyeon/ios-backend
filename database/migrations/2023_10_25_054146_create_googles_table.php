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
        Schema::create('googles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('app_id');
            $table->foreign('app_id')->references('id')->on('apps')->onDelete('cascade');
            $table->string('nativeAds')->default('ca-app-pub-3940256099942544/3986624511')->nullable();
            $table->string('interstitialAds')->default('ca-app-pub-3940256099942544/4411468910')->nullable();
            $table->string('bannerAds')->default('ca-app-pub-3940256099942544/2934735716')->nullable();
            $table->string('addOpenAds')->default('ca-app-pub-3940256099942544/5662855259')->nullable();
            $table->string('rewardedAds')->default('ca-app-pub-3940256099942544/1712485313')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('googles');
    }
};
