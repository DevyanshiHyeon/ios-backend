<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyAds extends Model
{
    use HasFactory;
    protected $fillable = ['app_id','nativeAds','interstitialAds','bannerAds','addOpenAds','rewardedAds','app_icon','image','description','link','title'];
}
