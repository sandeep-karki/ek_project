<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\ServiceProvider;

class EmailValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    public function boot()
    {
        $this->app['validator']->extend('invalidemail', function ($attribute, $value, $parameters) {

            $checkEmail = User::where('email', $value)->count();

            if ($checkEmail > 0) {
                return true;
            } else {
                return false;
            }

        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
