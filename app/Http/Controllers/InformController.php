<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformController extends Controller
{
    public function detained_form()
    {
        return view('web.inform.detained');
    }

    public function dead_form()
    {
        return view('web.inform.dead');
    }
}
