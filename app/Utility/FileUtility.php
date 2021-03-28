<?php

namespace App\Utility;

use Illuminate\Support\Str;

class FileUtility
{
    static function is_image(string $path): bool
    {
        $a = getimagesize($path);
        $image_type = $a[2];

        if (in_array($image_type, array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP))) {
            return true;
        }
        return false;
    }


    static function list_dir(string $dir): array
    {
        $resolve_path = function ($file) use ($dir) {
            return Str::finish($dir, '/') . $file;
        };
        if (is_dir($dir)) {
            $files = scandir($dir);
            return array_map($resolve_path, $files);
        }
        return [];
    }

    static function get_ext_from_file_name(string $file_path): string
    {
        return pathinfo($file_path)['extension'];
    }

    static function pathJoin(array $strs): string
    {
        $transformed_path = array_map(function ($str) {
            return trim($str, "/");
        }, $strs);
        return implode('/', $transformed_path);
    }
}
