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

//       public function store(Request $request, $id,$comment){
//
//
//        $comments = new Comment;
//        $comments->exam_id=$id;
//        $comments->student_id=Auth::user()->id;
//        $comments->comment= $request->comment;
//        $comments->save();
//
//
//           $view = view('public.view-exam', $comments)->render();
////           return response()->json(['status' => true, 'comments' => $view]);
//        return redirect()->back();
//       }

    public function store(Request $request,$id,$comment){

            $comments = new Comment;
            $comments->exam_id=$id;
            $comments->student_id=Auth::user()->id;
            $comments->comment= $request->comment;
            $comments->save();
            return response()->json(['status' => true, 'comments' => ['name'=>auth()->user()->name,'comment'=>$comments->comment,'date'=>$comments->created_at->diffForHumans()]]);



    }




}
