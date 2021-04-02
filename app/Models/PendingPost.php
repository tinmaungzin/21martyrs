<?php

namespace App\Models;

use App\Utility\ImageModule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'released_date',
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
        $this->attributes['gender'] = strtolower($val);
    }

    public function setReasonOfArrestAttribute($val)
    {
        $this->attributes['reason_of_arrest'] = strtolower($val);
    }

    public function setOccupationAttribute($val)
    {
        $this->attributes['occupation'] = strtolower($val);
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

    public function getStatusAttribute($value)
    {
        return ucfirst($value);
    }

    public static function getPostData($pendingPost)
    {
        if($pendingPost['profile_url'] != '') $data['profile_url'] = $pendingPost->getAttributes()['profile_url'];
        if($pendingPost['status'] != '') $data['status'] = $pendingPost->getAttributes()['status'];
        foreach(['name','comment', 'age', 'gender', 'occupation', 'organization_name',
                    'state_id', 'prison', 'detained_date' ,'reason_of_arrest','reason_of_dead','address','released_date'
                ] as $field )
        {
            if($pendingPost[$field] != '') $data[$field] = $pendingPost[$field];
        }
        $data['admin_id'] = auth()->guard('admin')->user()->id;

        return $data;
    }


    public static function getDataForStore($request)
    {
        $data = $request->except('photo');
        if ($request->has('photo'))
        {
            $path = Str::uuid() . '-' . $request->file('photo')->getClientOriginalName();
            $data['profile_url'] = ImageModule::uploadFromRequest('photo', $path);
        }

        if(!is_null($request->released_date)) $data['status'] = 'released';

        $data['gender'] = strtolower($data['gender']);
        $data['publishing_status'] = 'None';

        return $data;
    }


    public function getDataForHandleSuggestedEdit($request,$pendingPost)
    {

    }
}
