<?php

namespace Database\Seeders;

use App\Models\Advertisement_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdvertisementTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Advertisement_type::create([
            'name' => 'NativeAds'
        ]);
        Advertisement_type::create([
            'name' => 'InterstitialAds'
        ]);
        Advertisement_type::create([
            'name' => 'BannerAds'
        ]);
        Advertisement_type::create([
            'name' => 'AddOpenAds'
        ]);
        Advertisement_type::create([
            'name' => 'RewardedAds'
        ]);
    }
}
