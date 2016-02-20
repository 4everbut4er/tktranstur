<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Storage;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request){
        $this->validate($request, [
            'file.*' => 'image|required'
        ]);
        $files = $request->file('file');
        $result = [];
        if(is_array($files)){
            foreach($files as $file){
                /** @var $file \Symfony\Component\HttpFoundation\File\UploadedFile */
                $filename = str_random(10).time().$file->getClientOriginalName();
                $img = \Image::make($file)->fit(640, 480, function ($constraint) {
                    $constraint->upsize();
                });
                $dir = public_path(Photo::PATH_ORIGIN);
                if(\File::exists($dir) && !\File::isDirectory($dir) || !\File::exists($dir)){
                    \File::makeDirectory($dir, 0777, true);
                }
                $img->save($dir . '/' . $filename);

                $img = \Image::make($file)->fit(300, 300, function ($constraint) {
                    $constraint->upsize();
                });
                $dir = public_path(Photo::PATH_STANDART);
                if(\File::exists($dir) && !\File::isDirectory($dir) || !\File::exists($dir)){
                    \File::makeDirectory($dir, 0777, true);
                }
                $img->save($dir . '/' . $filename);

                $dir = public_path(Photo::PATH_MIN);
                if(\File::exists($dir) && !\File::isDirectory($dir) || !\File::exists($dir)){
                    \File::makeDirectory($dir, 0777, true);
                }
                $img->fit(100, 100, function ($constraint) {
                    $constraint->upsize();
                });
                $img->save($dir . '/' . $filename);
                $photo = new Photo();
                $photo->file = $filename;
                $photo->save();
                $result[] = $photo->getQueueableId();
            }
        }

        return response()->json($result);
    }

}
