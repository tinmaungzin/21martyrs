<?php

namespace App\Models;

use App\QueryFilter;
use App\Utility\ImageModule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $data)
 * @method static insert(array $transformedRows)
 */
class Post extends Model
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
        'admin_id',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'detained_date',
        'released_date'
    ];

    public function scopeFilter($query,QueryFilter $filters)
    {
        return $filters->apply($query);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function getProfileUrlAttribute($value): string
    {
        if (is_null($value)) {
            return "";
        }
        return ImageModule::urlFromPath($value);
    }

    public function getGenderAttribute($value)
    {
        return ucfirst($value);
    }

    public function getStatusAttribute($value)
    {
        return ucfirst($value);
    }

    public function getOccupationAttribute($value)
    {
        return ucfirst($value);
    }



}
