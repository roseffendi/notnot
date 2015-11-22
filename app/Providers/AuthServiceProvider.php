<?php

namespace App\Providers;

use Dingo\Api\Auth\Auth;
use Dingo\Api\Auth\Provider\OAuth2;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Booting application
     */
    public function boot()
    {
        $userRepository = $this->app['App\Repositories\UserRepository'];
        $oauthClientRepository = $this->app['App\Repositories\OauthClientRepository'];

        $this->app[Auth::class]->extend('oauth', function ($app) use ($userRepository, $oauthClientRepository) {
            $provider = new OAuth2($app['oauth2-server.authorizer']->getChecker());

            $provider->setUserResolver(function ($id) use ($userRepository) {
                return $userRepository->findById($id);
            });

            $provider->setClientResolver(function ($id) use ($oauthClientRepository) {
                return $oauthClientRepository->findById($id);
            });

            return $provider;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Repositories\UserRepository',
            'App\Infrastructure\Repositories\UserEloquentRepository'
        );

        $this->app->singleton('App\Repositories\OauthClientRepository',
            'App\Infrastructure\Repositories\OauthClientEloquentRepository'
        );
    }
}
