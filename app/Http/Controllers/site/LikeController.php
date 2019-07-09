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
        public function store($id,$type){

            Like::updateOrCreate(['student_id' => auth::user()->id,'exam_id'=>$id],['likenum'=>$type]);

            $like = Like::where('exam_id',$id)->where('likenum','=',1)->count();
            $dislike = Like::where('exam_id',$id)->where('likenum','=',0)->count();
            return response()->json(['status' => true, 'like' => $like,'dislike'=>$dislike]);
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
        $like = Like::updateOrCreate(['student_id' => auth::user()->id,'exam_id'=>$id,['likenum'=>0]]
                                     );

        $like = Like::where('exam_id',$id)->where('likenum','=',1)->count();
        return response()->json(['status' => true, 'like' => $like]);

//        $student_id= Auth::user()->id;
//        $like = Like::where('student_id', '=', $student_id )->where ('exam_id' ,'=' ,$id)->first();
//        $like->likenum='0';
//        $like->save();

        }



}
