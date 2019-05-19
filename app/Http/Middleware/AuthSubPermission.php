<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthSubPermission
{

    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->permission == 2)
        {
            return $next($request);
        } else {
            return abort(404);
        }
    }
}
