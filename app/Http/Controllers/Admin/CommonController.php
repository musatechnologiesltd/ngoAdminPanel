<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
class CommonController extends Controller
{
    public static  function imageUpload($request,$file,$filePath){


        $path = public_path('uploads/'.$filePath);

        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }


        $extension = $file->getClientOriginalName();
        $filename = $extension;
        $file->move('public/uploads/'.$filePath.'/', $filename);
        $imageUrl =  'public/uploads/'.$filePath.'/'.$filename;


    return $imageUrl;
    //$imageUrl = $this->imageUpload($request);

    }
}
