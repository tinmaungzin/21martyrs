<?php


namespace App\Utility;


use Illuminate\Support\Str;

class StringUtility
{
    public static function isEmpty($str = ""): bool
    {
        if (is_null($str)) {
            return true;
        }
        return Str::of($str)->isEmpty();
    }
}
