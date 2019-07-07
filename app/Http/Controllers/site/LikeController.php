<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exam;
use App\Like;
use Auth;
use App\User;
use phpDocumentor\Reflection\DocBlock\Tags\Link;


class LikeController extends Controller
{
        public function store(Request $request,$id){

            $like = Like::updateOrCreate(['student_id' => auth::user()->id],['exam_id'=>$id]);
            $like->likenum='1';
            $like->save();
//            updateOrCreate(['id' => 1, 'name' => 'Joe'] , ['age' => 15] );
//            dd($like);
//            $like->foo = Input::get('foo');
//            $like->save();
//
//            $student_id= Auth::user()->id;
//            $like = Like::where('student_id', '=', $student_id )->where ('exam_id' ,'=' ,$id)->first();
//            $like->likenum='1';
//            $like->save();



        }

    public function dislike($id){
        $like = Like::updateOrCreate(['student_id' => auth::user()->id],
                                     ['exam_id'=>$id]
                                     );
        $like->likenum='0';
        $like->save();

//        $student_id= Auth::user()->id;
//        $like = Like::where('student_id', '=', $student_id )->where ('exam_id' ,'=' ,$id)->first();
//        $like->likenum='0';
//        $like->save();

        }



}
