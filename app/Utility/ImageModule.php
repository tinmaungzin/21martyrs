<?php

namespace App\Utility;

use Exception;
use Illuminate\Support\Facades\Storage;

class ImageModule
{

    public static function uploadFromRequest(String $imageKey, String $name)
    {
        $DO_BASE_FOLDER = env('DO_BASE_FOLDER', 'development');

        var_dump(
            'FILESYSTEM_DISK',
            config('filesystems.default'),
            "base folder",
            $DO_BASE_FOLDER,
            $name,
            env("DO_ACCESS_KEY_ID"),
            env("DO_ENDPOINT"),
            env("DO_DEFAULT_REGION"),
            env("DO_URL"),
            env("DO_BUCKET")
        );

        return request()->file($imageKey)->storePubliclyAs('/' . $DO_BASE_FOLDER, $name, config('filesystems.default'));
    }

    public static function urlFromPath(String $path)
    {

        return Storage::disk(config('filesystems.default'))->url($path);
    }
}
