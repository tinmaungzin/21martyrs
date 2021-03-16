<?php

namespace App\Http\Views\Composers;

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class AuthStaffComposer
{

//    protected $user;


    public function __construct()
    {
//        $this->user = Route::currentRouteName();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $user = null;
        if(auth()->guard('admin')->check()) $user= auth()->guard('admin')->user()->name;
        if(auth()->guard('employee')->check()) $user= auth()->guard('employee')->user()->name;
        $view->with('user', $user);
    }
}
