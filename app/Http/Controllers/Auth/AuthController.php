<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function confirm_password_form()
    {
        return view('admin.auth.confirm_password');
    }
}
