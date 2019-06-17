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

        $likes= new Like;
        $likes->student_id= Auth::user()->id;
        $likes->exam_id=$id;
        $likes->likenum='1';
        $likes->save();
        return redirect()->back();


    }
}
