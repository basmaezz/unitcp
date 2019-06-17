<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Exam;
use App\Comment;
use App\User;
use Auth;
use DB;

class CommentController extends Controller
{

    public function Index()
    {

    }

       public function store(Request $request, $id){

        $comment = new Comment;
        $comment->exam_id=$request->exam_id;
        $comment->student_id=Auth::user()->id;
        $comment->comment= $request->txtcomment;
        $comment->save();
        return redirect()->back();
       }




}
