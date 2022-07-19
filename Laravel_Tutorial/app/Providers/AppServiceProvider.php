<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::if('env', function ($value){ // @env('local')
            // tra ve gia tri boolean
            if(config('app.env') === $value){ // xem thu muc config -> app.php -> bien env
                return true;
            }
            return false;
        });
    }
}
