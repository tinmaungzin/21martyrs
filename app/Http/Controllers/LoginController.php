<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $this->validateRequest($request);

        if($this->isAdmin($request)) return redirect(route('admins.index'));

        return redirect(route('admin.login'))->withErrors(array('password'=>'Email and Password do not match!'));
    }

    public function validateRequest($request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
    }

    public function isAdmin($request)
    {
        return Auth::guard('admin')->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
    }

    public function logout()
    {
        if(Auth::guard('admin')->check()) Auth::guard('admin')->logout();

        return redirect(route('admin.login'));
    }
}
