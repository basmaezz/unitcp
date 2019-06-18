<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class CheckActive
{

    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->active == 1)
        {
            return $next($request);
        } elseif (Auth::check() && Auth::user()->active == 0 ) {

            dd('Not Active');
//           return view('panel.pause');
        }
        return abort(404);
    }
}
