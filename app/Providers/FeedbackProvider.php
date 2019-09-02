<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use App\Assist\FeedbackImpl;
use Illuminate\Support\ServiceProvider;

class FeedbackProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Assist\Contracts\Feedback', function() {
            return new FeedbackImpl();
        });
        $this->app->bind('feedback', function() {
            return App::make('App\Assist\Contracts\Feedback');
        });
    }
}
