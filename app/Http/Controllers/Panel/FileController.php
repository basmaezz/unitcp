<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Logic\FileRepository;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class Filecontroller extends Controller
{
    protected $file;

    public function __construct(FileRepository $fileRepository)
    {
        $this->file = $fileRepository;
    }

    public function uploadFile() {
        $file = Input::all();
        $response = $this->file->upload($file, 'file');
        return $response;
    }


    public function get_file($id){
        $path = storage_path().'/app/uploads/files/'.$id;
        if(!File::exists($path)) abort(404);
        return response()->download($path);
    }



    public function delete_file(Request $request) {
        $filename = $request->id;
        if(!$filename)
        {
            return 0;
        }
        $response = $this->file->delete( $filename );

        return $response;
    }

    public function deleteUploadUser() {

        $filename = Input::get('id');

        if(!$filename)
        {
            return 0;
        }

        $response = $this->file->deleteUser( $filename );

        return $response;
    }

    /**
     * Part 2 - Display already uploaded images in Dropzone
     */


    public function getServerImages() {
        $images = Image::select('id', 'title', 'filename', 'display')->where('status', 0)->latest('id')->get();

        $imageAnswer = [];

        foreach ($images as $image) {
            $path = storage_path('app/uploads/images/'.$image->filename);
            $imageAnswer[] = [
                'img_id' => $image->id,
                'name' => $image->filename,
                'filename' => $image->filename,
                'title' => $image->title,
                'display' => $image->display,
                'size' => File::size($path)
            ];
        }

        return response()->json([
            'images' => $imageAnswer
        ]);
    }
}
