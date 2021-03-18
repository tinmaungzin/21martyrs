<?php

namespace App\Providers;

use App\Http\Views\Composers\AuthStaffComposer;
use App\Http\Views\Composers\RouteComposer;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->sidebarRoute();

        if (!App::environment('local')) {
            URL::forceScheme('https');
        }

        //        $this->sidebarAuthstaff();
    }

    public function sidebarRoute(): array
    {
        return View::composer(
            'layout.adminpanel.sidebar',
            RouteComposer::class
        );
    }

    public function sidebarAuthstaff(): array
    {
        return View::composer(
            'layout.adminpanel.sidebar',
            AuthStaffComposer::class
        );
    }
}
