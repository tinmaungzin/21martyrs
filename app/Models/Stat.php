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
        'today_dead',
        'today_detained',
        'today_hurt',
        'total_dead',
        'total_detained',
        'total_hurt',
    ];
}
