<?php
/**
 * Created by PhpStorm.
 * User: AhmadGomaa
 * Date: 10/30/2018
 * Time: 4:20 AM
 */


namespace App\Http\Middleware;

use Closure;
use App;
use Config;
use Session;
use Carbon\Carbon;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
//    public function handle($request, Closure $next)
//    {
//        $raw_locale = Session::get('locale');
//        if (in_array($raw_locale, Config::get('app.locales'))) {
//            $locale = $raw_locale;
//        } else {
//            $locale = Config::get('app.locale');
//        }
//        App::setLocale($locale);
//
//        return $next($request);
//    }

    public function handle($request, Closure $next)
    {
        if(\Session::has('locale'))
        {
            \App::setlocale(\Session::get('locale'));
        }
        return $next($request);
    }
}