<?php

namespace App\Utility;



class S3Image
{

    public static function uploadFromRequest(String $imageKey, String $name)
    {
        $DO_BASE_FOLDER = env('DO_BASE_FOLDER', 'development');

        return request()->file($imageKey)->storePubliclyAs('/' . $DO_BASE_FOLDER, $name, 'do-s3');
    }
}
