<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        //this config was did by me and you can to modify or delete if you want
        setlocale(LC_ALL,"es_MX.utf8");
        Carbon::setLocale(config('app.locale'));
    }
}
