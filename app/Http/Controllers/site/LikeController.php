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

       $exam=Exam::find($id);
        $exam->likes_num=$exam->likes_num+1;
        $exam->save();
        $view = view('public.view-exam', $exam)->render();

        return response()->json(['status' => true, 'item' => $view]);


    }

    public function dislike($id){
        $exam=Exam::find($id);
        $exam->dislike_num=$exam->dislike_num+1;
        $exam->save();
//        return redirect()->back();


}
}
