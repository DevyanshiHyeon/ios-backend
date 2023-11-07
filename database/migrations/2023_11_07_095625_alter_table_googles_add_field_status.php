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
        Schema::table('googles', function (Blueprint $table) {
            $table->boolean('nativeAds_status')->default(false)->after('nativeAds');
            $table->boolean('interstitialAds_status')->default(false)->after('interstitialAds');
            $table->boolean('bannerAds_status')->default(false)->after('bannerAds');
            $table->boolean('addOpenAds_status')->default(false)->after('addOpenAds');
            $table->boolean('rewardedAds_status')->default(false)->after('rewardedAds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
