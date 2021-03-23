<?php


namespace App\Utility;


use Illuminate\Support\Str;

class StringUtility
{
    public static function isEmpty(string $str): bool
    {
        return Str::of($str)->isEmpty();
    }
}
