<?php

namespace App\Logic;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
//use Intervention\Image\ImageManager;
//use \App\Image;
use \Storage;

use Illuminate\Http\Request;

class FileRepository {

    private $full_save_path = 'app/uploads/files/';
    private $save_path = 'uploads/files/';
    public function upload( $form_data, $type ) {
        $validator = Validator::make($form_data, \App\File::$rules,\App\File::$messages);
        if ($validator->fails()) {
            return Response::json([
                'error' => true,
                'message' => $validator->messages()->first(),
            ], 400);
        }

//        TODO :: File its an object of request


        $file = $form_data['file'];
        $file_size = $file->getClientSize();
        $extension = $file->getClientOriginalExtension();
        $filename = 'file_'.time().mt_rand();
        $allowed_filename = $this->createUniqueFilename( $filename, $extension );
        $uploadSuccess1 = $this->original( $file, $allowed_filename );
        $originalName = str_replace('.'.$extension, '', $file->getClientOriginalName());
        if( !$uploadSuccess1 ) {
            return Response::json([
                'error' => true,
                'message' => 'حدثت مشكلة في الخادم أثناء رفع الملفات',
            ], 500);
        }


//        $file = $request->file('file');
        $fileName = time().$file->getClientOriginalName();
//        $path = storage_path('app/uploads/images/'.$file->filename);
//        dd($file);
        $file = $file->storeAs('faculty/exams/'.request('facid'),$allowed_filename);
        //$upload_success = $file->move(storage_path('faculty/exams/'.request('facid')),$file);

        $file = new \App\File;
        $file->display_name = $originalName.'.'.$extension;
        $file->file_name = $allowed_filename;
        $file->mime_type = $extension;
        $file->size = $file_size;
        $file->save();
        return Response::json([
            'status' => true,
            'file_name' => $allowed_filename,
            'display_name' =>   $file->display_name,
            'id' => $file->id
        ], 200);
    }

    public function createUniqueFilename( $filename, $extension ) {
        $path = storage_path($this->full_save_path . $filename . '.' . $extension);


        if ( File::exists( $path ) )
        {
            $imageToken = substr(sha1(mt_rand()), 0, 5);
            return $filename . '-' . $imageToken . '.' . $extension;
        }

        return $filename . '.' . $extension;
    }

    /**
     * Optimize Original Image
     */
    public function original( $file, $filename ) {
        $image = $file->storeAs($this->save_path, $filename);
        return $image;
    }

    /**
     * Create Icon From Original
     */
    public function icon( $file, $filename )
    {
        $manager = new ImageManager();
        $image = $manager->make( $file )->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save( $this->icon_save_path  . $filename );
        return $image;
    }

    public function delete($filename) {

        $file =  \App\File::where('file_name', 'like', $filename)->first();
        if(empty($file))
        {
            $file  =  \App\File::where('display_name', 'like', $filename)->first();
            if(empty($file)) {
                return Response::json([
                    'error' => true,
                    'file_name' => $filename,
                    'code' => 400
                ], 400);
            }
        }
        $path = storage_path($this->full_save_path . $filename );
        if ( File::exists( $path ) ) {
            Storage::delete('uploads/files/'. $filename);
        }
        if( !empty($file)) {
            $file->delete();
        }
        return Response::json([
            'error' => false ,
            'id' => $file->id ,
            'filename' => $filename ,
            'message' => 'تم حذف الملف بنجاح',
            'code'  => 200
        ], 200);
    }

    function sanitize($string, $force_lowercase = true, $anal = false)
    {
        $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
            "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
            "â€”", "â€“", ",", "<", ".", ">", "/", "?");
        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;

        return ($force_lowercase) ?
            (function_exists('mb_strtolower')) ?
                mb_strtolower($clean, 'UTF-8') :
                strtolower($clean) :
            $clean;
    }
}