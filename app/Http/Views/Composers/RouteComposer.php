<?php

namespace App\Http\Views\Composers;

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class RouteComposer
{

    protected $route;


    public function __construct()
    {
        $this->route = Route::currentRouteName();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('route', $this->route);
    }
}
