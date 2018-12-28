<?php

namespace App\Providers;

use App\Helper\Api\Parser;
use App\Helper\Ekcms\EkHelper;
use Illuminate\Support\ServiceProvider;

class EkServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        require_once app_path() . '/Helper/Api/Parser.php';

        $this->app->bind('EkParser', function ($app) {
            return new Parser;
        });


        require_once app_path() . '/Helper/Ekcms/EkHelper.php';

        $this->app->bind('EkHelper', function ($app) {
            return new EkHelper();
        });
    }
}
