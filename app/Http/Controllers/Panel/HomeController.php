<?php

namespace App\Http\Controllers\panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Faculty;
use App\User;
use App\Exam;
use App\visitor;
use App\Log;

class HomeController extends Controller
{


    public function index(){
        $faculty= Faculty ::all()->count();
        $user= User ::all()->count();
        $exam=Exam::all()->count();
        $visitor=visitor::all()->count();
        $logs= Log::orderBy('id', 'desc')->take(5)->get();
        $latest= Exam::orderBy('created_at','desc')->paginate(5);



        return view('panel.home',compact('faculty','user','exam','visitor','logs','latest'));
    }


    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->online = 0;
        $user->save();
        Auth::logout();
        return redirect()->route('panel.login')->send();
    }
}
