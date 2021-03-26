<?php

namespace App\Http\Controllers\Auth;

//use App\Http\Controllers\;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

//use Illuminate\Foundation\Auth\Thro

class LoginController extends Controller
{

    public function loginForm()
    {
        return view('admin.auth.login');
    }

    public function resetPasswordForm()
    {
        return view('admin.auth.reset_password');
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $user = Auth::guard('admin')->user();
        $user->password = bcrypt($request->password);
        $user->save();
        $request->session()->flash('status', 'Password reset successfully.');
        return $this->logout();

    }

    public function logout()
    {
        if (Auth::guard('admin')->check()) Auth::guard('admin')->logout();

        return redirect('/admin/login');
    }

    public function login(Request $request)
    {
        $this->validateRequest($request);

        if ($this->isAdmin($request)) return redirect(route('admins.index'));

        return redirect(route('admin.login'))->withErrors(array('password' => 'Email and Password do not match!'));
    }

    public function validateRequest($request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }

    public function isAdmin($request)
    {
        return Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);
    }
}
