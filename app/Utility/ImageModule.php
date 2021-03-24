<?php

namespace App\Utility;

use Exception;
use Illuminate\Support\Facades\Storage;

class ImageModule
{

    public static function uploadFromRequest(string $imageKey, string $name)
    {
        $DO_BASE_FOLDER = env('DO_BASE_FOLDER', 'development');

        $DEFAULT_DISK = config('filesystems.default');
        var_dump(
            'FILESYSTEM_DISK',
            config('filesystems.default'),
            "base folder",
            $DO_BASE_FOLDER,
            $name,
            "DO information: \n",
            env("DO_ACCESS_KEY_ID"),
            env("DO_ENDPOINT"),
            env("DO_DEFAULT_REGION"),
            env("DO_URL"),
            env("DO_BUCKET")
        );

        return request()->file($imageKey)->storePubliclyAs('/' . $DO_BASE_FOLDER, $name, config('filesystems.default'));
//        $path = Storage::disk($DEFAULT_DISK)->putFileAs($DO_BASE_FOLDER, request()->file($imageKey), $name);
//        Storage::disk($DEFAULT_DISK)->setVisibility($path, 'public');
//        return $path;
    }

    public static function urlFromPath(string $path)
    {

        return Storage::disk(config('filesystems.default'))->url($path);
    }
}
