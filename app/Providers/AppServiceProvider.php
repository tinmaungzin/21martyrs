<?php

namespace App\Providers;

use App\Http\Views\Composers\AuthStaffComposer;
use App\Http\Views\Composers\RouteComposer;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
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
        if (!Collection::hasMacro('paginate')) {

            Collection::macro('paginate',
                function ($perPage = 15, $page = null, $options = []) {
                    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
                    return (new LengthAwarePaginator(
                        $this->forPage($page, $perPage)->values()->all(), $this->count(), $perPage, $page, $options))
                        ->withPath('');
                });
        }

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
            'layout.adminpanel.sidebar',
            AuthStaffComposer::class
        );
    }

//    public function pagination()
//    {
//        return Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page')
//        {
//            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
//            return new LengthAwarePaginator(
//                $this->forPage($page, $perPage),
//                $total ?: $this->count(),
//                $perPage,
//                $page,
//                [
//                    'path' => LengthAwarePaginator::resolveCurrentPath(),
//                    'pageName' => $pageName,
//                ]
//            );
//        });
//    }

}
