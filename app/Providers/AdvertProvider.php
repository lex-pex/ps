<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use App\Assist\AdvertImpl;
use Illuminate\Support\ServiceProvider;

class AdvertProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     * @return void
     */
    public function boot(){}
    /**
     * Register services.
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Assist\Contracts\Advert', function() {
            return new AdvertImpl();
        });
        $this->app->bind('advert', function() {
            return App::make('App\Assist\Contracts\Advert');
        });
    }
}