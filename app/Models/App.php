<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class App extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['name','bundle_id','app_icon','description','image','link','title'];
    public function advertisementTypes()
    {
        return $this->belongsToMany(Advertisement_type::class, 'app_advertisement_type');
    }
}
