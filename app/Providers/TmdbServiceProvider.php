<?php

namespace App\Providers;

use Config;
use Illuminate\Support\ServiceProvider;
use Tmdb\ApiToken;
use Tmdb\Client;

class TmdbServiceProvider extends ServiceProvider
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
        $this->app->singleton(Client::class, function($app) {
            $token = $app->make('config')->get('app.tmdb_token');
            $tokenObj = new ApiToken($token);
            return new Client($tokenObj);
        });
    }
}
