<?php

namespace App\Models;

use App\Utility\ImageModule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingPost extends Model
{
    use HasFactory;

//    protected $guarded = [];
    protected $fillable = [
        'name',
        'comment',
        'age',
        'address',
        'profile_url',
        'gender',
        'occupation',
        'organization_name',
        'city_id',
        'state_id',
        'status',
        'prison',
        'detained_date',
        'reason_of_dead',
        'reason_of_arrest',
        'informant_name',
        'informant_phone',
        'informant_association_with_victim',
        'post_id',
        'user_id',
        'publishing_status',
    ];


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


    public function getProfileUrlAttribute($value)
    {
        if (is_null($value)) {
            return "";
        }
        return ImageModule::urlFromPath($value);
    }
}
