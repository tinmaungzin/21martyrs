<?php

namespace App\Models;

use App\Models\Traits\GenericDB;
use App\QueryFilter;
use App\Utility\ImageModule;
use App\Utility\StringUtility;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @method static create(array $data)
 * @method static insert(array $transformedRows)
 * @method static filter(\App\PostFilter $post_filter): Builder
 * @method static name(string $name): Builder
 */
class Post extends Model
{
    use HasFactory, GenericDB;

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
        'admin_id',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
//        'detained_date',
//        'released_date'
    ];

    public static function getDataForStatusChange($request, $post)
    {
        $data = $request->all();
        $fields = ['name', 'comment', 'age', 'profile_url', 'gender', 'occupation', 'organization_name',
            'state_id', 'prison', 'address'];

        if ($data['status'] == 'released') array_push($fields, 'reason_of_arrest', 'reason_of_dead', 'detained_date');
        if ($data['status'] == 'dead') array_push($fields, 'reason_of_arrest');
        if ($data['status'] == 'detained') array_push($fields, 'reason_of_dead');
        if ($data['status'] == 'missing') array_push($fields, 'reason_of_arrest', 'reason_of_dead');

        foreach ($fields as $field) {
            if ($post[$field] != '') $data[$field] = $post[$field];
        }
        if ($post['profile_url'] != '') $data['profile_url'] = $post->getAttributes()['profile_url'];

        $data['post_id'] = $post->id;
        $data['publishing_status'] = 'None';
        return $data;
    }

    public static function getDataForStoreEdit($request, $post)
    {
        $data = $request->except('photo');
        if ($request->has('photo')) {
            $path = Str::uuid() . '-' . $request->file('photo')->getClientOriginalName();
            $data['profile_url'] = ImageModule::uploadFromRequest('photo', $path);
        } else {
            $data['profile_url'] = $post->getAttributes()['profile_url'];
        }
        $data['post_id'] = $post->id;
        $data['publishing_status'] = 'None';

        return $data;
    }

    public function scopeFilter($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }

    public function scopeName(Builder $query, string $name = null): Builder
    {
        if (!StringUtility::isEmpty($name)) {
            return self::caseInsensitiveSearch($query, 'name', $name);
        }
        return $query;
    }

    public function scopeState(Builder $query, string $state_id = null): Builder
    {
        if (StringUtility::isEmpty($state_id)) {
            return $query;
        }
        return $query->where('state_id', $state_id);
    }

    public function scopeStatus(Builder $query, string $status = null): Builder
    {
        if (StringUtility::isEmpty($status)) {
            return $query;
        }
        return $query->where('status', strtolower($status));
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
