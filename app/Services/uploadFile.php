<?php

namespace App\Services;

use Image;

class uploadFile
{
    public static function uploadImage($file, $dir, $count)
    {
        $file_name = '';
//        $dir = 'images/foods/'.$food_place_id.'/'.$avatar;
        $extension = $file->getClientOriginalExtension();
        $image_valid_extensions = ['jpg','png','jpeg', 'JPG', 'JPEG', 'PNG', 'jfif'];
        if(in_array($extension, $image_valid_extensions)){
            $file_name = $dir.'image'.time().$count.'.'.$extension;
//            Image::make($file->getRealPath())->resize(1112, null, function ($constraint) {
//                $constraint->aspectRatio();
//            })->save($file_name);
            Image::make($file->getRealPath())->save($file_name);
        }

        return $file_name;
    }
}
