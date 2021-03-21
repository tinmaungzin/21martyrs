<?php

namespace App\Models;

use App\Utility\ImageModule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingPost extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(Image::class);
    }


    public function setGenderAttribute($val)
    {
        $this->attributes['gender'] = ucfirst($val);
    }

    public function setReasonOfArrestAttribute($val)
    {
        $this->attributes['reason_of_arrest'] = ucfirst($val);
    }

    public function setOccupationAttribute($val)
    {
        $this->attributes['occupation'] = ucfirst($val);
    }

    public function setPublishingStatusAttribute($valu)
    {
        $this->attributes['publishing_status'] = ucfirst($valu);
    }



//    public function getProfileUrlAttribute($value)
//    {
//        return ImageModule::urlFromPath($value);
//    }
}
