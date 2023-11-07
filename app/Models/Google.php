<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Google extends Model
{
    use HasFactory;
    protected $fillable = ['app_id','nativeAds','interstitialAds','bannerAds','addOpenAds','rewardedAds',
    'nativeAds_status',
    'interstitialAds_status',
    'bannerAds_status',
    'addOpenAds_status',
    'rewardedAds_status'];
}
