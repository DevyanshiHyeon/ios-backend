<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class App extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['name',
    'bundle_id',
    'app_icon',
    'description',
    'image',
    'link',
    'title',
    'app_list',
    'is_ad_on',
    'is_custom_ads_on',
    'force_update_version',
    'live_version',
    'intertial_gap_count',
    'intertial_initial_count'
    ];
    public function advertisementTypes()
    {
        return $this->belongsToMany(Advertisement_type::class, 'app_advertisement_type');
    }
}
