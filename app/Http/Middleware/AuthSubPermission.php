<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthSubPermission
{

    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
