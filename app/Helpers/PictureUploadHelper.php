<?php


namespace App\Helpers;


use Carbon\Carbon;
use Storage;
use Str;

class PictureUploadHelper
{

    public static function uploadPictureToDisk($disk, $scope, $base64picture): string
    {
        $extension = explode('/', explode(':', substr($base64picture, 0, strpos($base64picture, ';')))[1])[1];
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64picture));
        $imageName = Carbon::now()->timestamp . '.' . $extension;
        Storage::disk($disk)->put("$scope/$imageName", $data, 'public');
        return self::getUrlFromDisk($disk, "$scope/$imageName");

    }

    public static function getUrlFromDisk($disk, $filename): string
    {
        return Storage::disk($disk)->url($filename);
    }

}
