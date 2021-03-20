<?php

namespace App\Models;

use App\Utility\ImageModule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingPost extends Model
{
    use HasFactory;

    protected array $guarded = [];


//    public function getProfileUrlAttribute($value)
//    {
//        return ImageModule::urlFromPath($value);
//    }
}
