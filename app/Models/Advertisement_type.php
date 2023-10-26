<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement_type extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function apps()
    {
        return $this->belongsToMany(App::class, 'app_advertisement_type');
    }
}
