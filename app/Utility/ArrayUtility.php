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

    public static function compact($array)
    {
        return array_reduce($array, function ($acc, $item) {
            if (is_null($item)) {
                return $acc;
            }
            array_push($acc, $item);
            return $acc;
        }, []);
    }
}
