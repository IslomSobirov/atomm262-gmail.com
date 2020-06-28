<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait ImageUpload
{
    public function UserImageUpload($query) // Taking input image as parameter
    {
        //Generate random name
        $image_name = \Str::random(20);

        $ext = strtolower($query->getClientOriginalExtension()); // You can use also getClientOriginalName()
        //Merge full name with extension
        $image_full_name = $image_name.'.'.$ext;

        $upload_path = 'image/';    //Creating Sub directory in Public folder to put image
        $image_url = $upload_path.$image_full_name;
        $success = $query->move($upload_path,$image_full_name);

        return $image_url; // Just return image
    }
}
