<?php


namespace App\Utility;


use Illuminate\Support\Arr;

class ArrayUtility
{
    /** @noinspection PhpMissingReturnTypeInspection */
    public static function except($array, array $keys)
    {
        return Arr::except($array, $keys);
    }
}
