<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class PanelLoginController extends Controller
{
    public function __construct()
    {
//        $this->middleware('guest:admin');
    }

    public function index()
    {
        $user=Auth::user();
//        $user = Auth::guard('admin');
        return (isset($user->user()->id)) ? redirect()->route(get_current_locale().'.panel.dashboard') : redirect()->route(get_current_locale().'.panel.login');
    }

    public function showLoginForm()
    {

        if(auth::check()){
            if (auth()->user()->permission==3){
                return redirect()->route('public.index');
            }
            return redirect()->route('panel.dashboard');
        }
        return view('panel.login');
    }


    public function login(Request $request)
    {
//dd($request);
        $this->validate($request, [
            'username' => 'required|min:1',
            'password' => 'required|min:3'
        ]);
        $credentials = ['username' => $request->username, 'password' => $request->password];
        if (Auth::attempt($credentials, $request->has('remember'))){
            $user= Auth::user();
            $user->online='1';
            $user->login_at=now();
            $user->save();
            if (auth()->user()->permission==3){
                return redirect()->route('public.index');
            }
            return redirect()->route('panel.dashboard');
        }
        session()->flash('response', __('البيانات المدخلة غير صحيحة'));
        return redirect()->back();
    }


    public function pause(){
        return view('panel.pause');
    }


}
