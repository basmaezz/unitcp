<?php

namespace App\Providers;

use App\Exam;
use App\Observe\Notifiy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Faculty;
use View;
use App\visitors;
use App\Config;
class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Debugbar::disable();
        Schema::defaultStringLength(191);
        $all_fac = Faculty::where('active',1)->orderBy('id', 'ASC')->get();
        View::share('all_fac', $all_fac);
//       / \Debugbar::disable();

        \Blade::if('admin', function () {
            if (auth()->user()->permission == 1)
            {
                return true;
            }
        });

//        if (empty(visitors::where('ip', \Request::ip())->first()->ip)){
//            $ip = new visitors;
//            $ip->ip = \Request::ip();
//            $ip->save();
//            $visitor = Config::find(Config::where('name','visitors')->first()->id);
//            $visitor->config = $visitor->config+1;
//            $visitor->save();
//        }
        Exam::observe(Notifiy::class);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
