<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Blade;

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
        Blade::directive('shortWord', function ($words) {
            if(strlen($words) >= 5){
                return `substr($words, 0, 5)... `;
            } else{
                return $words;
            }
        });
        Schema::defaultStringLength(191);
    }
}
