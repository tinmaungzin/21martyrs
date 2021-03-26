<?php

namespace App\Providers;

use App\Actions\Fortify\ConfirmUserPassword;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Admin;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
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
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::confirmPasswordsUsing(function (Admin $admin, string $password) {
            return ConfirmUserPassword::confirmPassword($admin, $password);
        });

//        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::authenticateUsing(function (Request $request) {
            $isAdmin = Auth::guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password,
            ]);
            if ($isAdmin) {
                return Admin::where(['email' => strtolower($request->email)])->first();
            }
            return null;
        });

        RateLimiter::for('login', function (Request $request) {
            if (App::environment('production')) {
                return Limit::perHour(5, 3)->by($request->email . $request->ip());
            }
            return Limit::perMinute(1000)->by($request->email . $request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
