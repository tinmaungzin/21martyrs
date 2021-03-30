<?php /** @noinspection PhpUnusedParameterInspection */

namespace App\Providers;

use App\Http\Views\Composers\AuthStaffComposer;
use App\Http\Views\Composers\RouteComposer;

use Aws\S3\S3Client;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;

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
        if ($this->app->environment() === 'local') {
            $this->app->register(IdeHelperServiceProvider::class);
        }
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
//        // Registiering Digitalocean space filesystem
//        Storage::extend('do-space',function ($app,$config): Filesystem {
////            dd('config from extends', $config);
//            $do_client = new DOS3Client($config);
//            return new FileSystem($do_client->adaptor);
//        });

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
