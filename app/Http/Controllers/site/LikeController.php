<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exam;
use App\Like;
use Auth;
use App\User;


class LikeController extends Controller
{
    public function store(Request $request,$id){

//        $likes= new Like;
//        $likes->student_id= Auth::user()->id;
//        $likes->exam_id=$id;
//        $likes->likenum='1';
//        $likes->save();
//        return redirect()->back();

        $exam=Exam::find($id);
        $exam->likes_num=$exam->likes_num+1;
        $exam->save();
        return redirect()->back();


    }

    public function dislike($id){
        $exam=Exam::find($id);
        $exam->dislike_num=$exam->dislike_num+1;
        $exam->save();
        return redirect()->back();


}
}
