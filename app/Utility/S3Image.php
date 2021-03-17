<?php

namespace App\Utility;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class S3Image
{


    public static function uploadFromRequest(String $fileName, String $path)
    {
        return request()->file($fileName)->storePublicly('/' . . '/' . $path);
    }
}
