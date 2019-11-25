<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FormatTimeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        require_once app_path() . '/Helpers/FormatTime.php';
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
