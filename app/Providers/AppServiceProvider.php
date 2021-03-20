<?php

namespace App\Providers;

use App\Http\Views\Composers\AuthStaffComposer;
use App\Http\Views\Composers\RouteComposer;
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

//        $this->sidebarAuthstaff();
    }

    public function sidebarRoute(): array
    {
        return View::composer(
            'admin.layout.sidebar', RouteComposer::class
        );
    }

    public function sidebarAuthstaff(): array
    {
        return View::composer(
            'layout.adminpanel.sidebar', AuthStaffComposer::class
        );
    }
}
