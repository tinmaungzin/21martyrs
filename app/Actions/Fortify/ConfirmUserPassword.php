<?php


namespace App\Actions\Fortify;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Actions\ConfirmPassword;

class ConfirmUserPassword
{
    public static function confirmPassword($user, string $password): bool
    {
        return Auth::guard('admin')->attempt([
            'email' => $user->email,
            'password' => $password
        ]);
    }
}
