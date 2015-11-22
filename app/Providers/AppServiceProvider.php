<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $api = app('Dingo\Api\Routing\Router');

        $api->version('v1', function ($api) {
            require __DIR__.'/../Http/apiroutesv1.php';
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Repositories\NoteRepository',
            'App\Infrastructure\Repositories\NoteEloquentRepository'
        );   
    }
}
