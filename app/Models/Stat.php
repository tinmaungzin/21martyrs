<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasFactory;
//    /**
//     * The attributes that aren't mass assignable.
//     *
//     * @var array
//     */
//    protected $guarded = [];

    protected $fillable = [
        'total_death',
        'headshot',
        'gunshot',
        'assault',
        'abducted',
        'released',
    ];

}
