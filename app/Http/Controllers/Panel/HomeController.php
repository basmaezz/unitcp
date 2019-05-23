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


        return view('panel.home',compact('faculty','user','exam','visitor','logs'));
    }




    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route(get_current_locale().'.panel.login');
    }
}
