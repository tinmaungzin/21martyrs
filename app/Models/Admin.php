<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

/**
 * @method static firstOrCreate(string[] $array, array $array1)
 * @method static where(array $array)
 */
class Admin extends Authenticable
{
    use HasFactory;

    protected $guarded = [];

}
