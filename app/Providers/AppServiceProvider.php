<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
use Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::directive('myDirective', function ($var) {
            return "<h1>New Directive - $var</h1>";
        });

        Response::macro('myRes', function ($value) {

            return Response::make($value);

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
