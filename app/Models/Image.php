<?php

namespace App\Models;

use App\Utility\ImageModule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getUrlAttribute($url)
    {
        return ImageModule::urlFromPath($url);
    }
}
