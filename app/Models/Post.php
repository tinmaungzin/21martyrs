<?php

namespace App\Models;

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

    protected $guarded = [];


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


    public function scopeState($query, $state_id)
    {
        return $query->where('state_id', '=', $state_id);
    }

    public function scopeStatus($query, $status)
    {
        return $query->where('state_id', '=', $status);
    }

    public function scopeGender($query, $gender)
    {
        return $query->where('state_id', '=', $gender);
    }
}
