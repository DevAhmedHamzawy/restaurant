<?php

namespace App\Upload;

use Illuminate\Support\Str;

class Upload
{
    public static function uploadImage($image, $sectionName, $name){

        $fileName = Str::slug($name) . '_' . time() . '.' . $image->getClientOriginalExtension();
        $image->storePubliclyAs("public/${sectionName}/", $fileName);

        return $fileName;
    }

    public static function deleteImage($img_path)
    {
        if (file_exists($img_path)) {

            @unlink($img_path);

        }
    }
}
