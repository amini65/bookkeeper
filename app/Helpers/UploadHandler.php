<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadHandler
{

    public static function uploadImage($fileFromRequest, $uploadPath, $currentFile = null, $base64 = false)
    {
        if (is_array($currentFile)) {
            if (Storage::disk('document')->exists($currentFile['path'] . '/' . $currentFile['file']))
                Storage::disk('document')->delete($currentFile['path'] . '/' . $currentFile['file']);
        }

        $random = Str::random(10);
        $path = $uploadPath;

        if ($base64 == true) {
            $image_64 = $fileFromRequest;

            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = $random . '_' . time() . '.' . $extension;

            Storage::disk('document')->put($path . $imageName, base64_decode($image));

            return $imageName;
        }

        $name = $random . '_' . time() . '.' . $fileFromRequest->getClientOriginalExtension();
        $fileFromRequest->move(public_path($path), $name);

        return $name;
    }
    public static function uploadDocumentHandler($fileFromRequest, $uploadPath, $base64 = false)
    {
//        dd($fileFromRequest);
        $random = Str::random(12);
        $path = $uploadPath;

        if ($base64 == true) {
            $image_64 = $fileFromRequest;

            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = $random . '_' . time() . '.' . $extension;
            Storage::disk('images')->put($path . $imageName, base64_decode($image));

            return $path.$imageName;
        }
        $name =$random.time(). '.' . $fileFromRequest->getClientOriginalExtension();
         $fileFromRequest->move(public_path($path), $name);
        return env('ASSET_URL').$uploadPath.$name;
    }

    public static function convertPersianNumbersToLatin($input)
    {
        $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $english = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

        return str_replace($persian, $english, $input);
    }
}
