<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use Illuminate\Http\Request;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map(Router $router, Request $request)
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapPanelRoutes();

//        $locale = $request->segment(1);
//        $this->app->setLocale($locale);
//        $router->group(['namespace' => $this->namespace, 'prefix' => $locale], function($router) {
//            require app_path('Http\routes.php');
//        });
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapPanelRoutes()
    {
            Route::prefix('/admin')
                ->middleware('web')
                ->namespace($this->namespace . '\Panel')
                ->group(base_path('routes/panel.php'));

        Route::prefix('/units')
            ->middleware('web')
            ->namespace($this->namespace . '\units')
            ->group(base_path('routes/units.php'));

    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
