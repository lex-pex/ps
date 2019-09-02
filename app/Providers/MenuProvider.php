<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use App\Assist\MenuImpl;
use Illuminate\Support\ServiceProvider;

class MenuProvider extends ServiceProvider
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
        $this->app->bind('App\Assist\Contracts\Menu', function() {
            return new MenuImpl();
        });
        $this->app->bind('menu', function() {
            return App::make('App\Assist\Contracts\Menu');
        });
    }
}
