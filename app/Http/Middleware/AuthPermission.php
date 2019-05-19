<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthPermission
{

    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->permission == 1)
        {
            return $next($request);
        } else {
            return abort(404);
        }
    }
}
