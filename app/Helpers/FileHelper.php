<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use function PHPUnit\Framework\fileExists;

class FileHelper
{
    /**
     * The save files path
     */
    public const FILES_PATH = '/public/files';


    public static function getStoragePath($without_asset = false)
    {
        if ($without_asset) {
            return 'storage/files';
        }
        return asset('/storage/files');
    }

    /**
     * @param $path
     * @return bool
     */
    public static function CreateDir($path): bool
    {
        $path = trim($path);

        if (Str::startsWith($path, DIRECTORY_SEPARATOR)) {
            $path = Str::replaceFirst(DIRECTORY_SEPARATOR, '', $path);
        }
        if (!file_exists($path)) {
            return mkdir($path, 0777, true);
        }
        return false;
    }

    public static function SaveImage($image, $path)
    {
        $file_name = $image->getClientOriginalName();

        if ($image->move(Storage::path($path), $file_name)) {
            return $file_name;
        }
        return false;
    }

}
