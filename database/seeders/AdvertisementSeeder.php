<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Advertisement::create([
            'name' => 'Google'
        ]);
        Advertisement::create([
            'name' => 'FaceBook'
        ]);
        Advertisement::create([
            'name' => 'My Ads'
        ]);
    }
}
