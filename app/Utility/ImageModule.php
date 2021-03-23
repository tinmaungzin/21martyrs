<?php

namespace App\Utility;

use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ImageModule
{

    private static function prepare_folder(): string
    {
        $DO_BASE_FOLDER = env('DO_BASE_FOLDER', 'development');
        return '/' . $DO_BASE_FOLDER;
    }

    public static function uploadFromRequest(string $imageKey, string $name)
    {

        return request()->file($imageKey)->storePubliclyAs(self::prepare_folder(), $name, config('filesystems.default'));
//        $path = Storage::disk($DEFAULT_DISK)->putFileAs($DO_BASE_FOLDER, request()->file($imageKey), $name);
//        Storage::disk($DEFAULT_DISK)->setVisibility($path, 'public');
//        return $path;
    }

    /**
     * @param string $upload_path
     * @param $content
     * @param string $visiblity
     * @return string
     */
    public static function upload(string $upload_path, $content, $visiblity = 'public'): string
    {
        $final_path = self::prepare_folder() . Str::start($upload_path, '/');
//        Storage::disk(config('filesystems.default'))->put($final_path, $content, $visiblity);
        return Storage::disk(config('filesystems.default'))->path($final_path);
    }

    public static function urlFromPath(string $path): string
    {
        return Storage::disk(config('filesystems.default'))->url($path);
    }
}
