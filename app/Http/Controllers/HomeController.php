<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('web.index');
    }

    public function about_us()
    {
        return view('web.about_us');
    }
}
