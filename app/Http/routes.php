<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->welcome();
});

$app->get('login', ['uses' => 'AuthController@getLogin', 'as' => 'auth.login.get']);
$app->post('login', ['middleware' => 'csrf', 'uses' => 'AuthController@postLogin', 'as' => 'auth.login.post']);
$app->get('logout', ['uses' => 'AuthController@getLogout', 'as' => 'auth.logout.get']);

$app->get('oauth/authorization', ['middleware' => ['check-authorization-params', 'auth'], 'uses' => 'OauthController@getAuthorization', 'as' => 'oauth.authorization.get']);
$app->post('oauth/authorization', ['middleware' => ['csrf', 'check-authorization-params', 'auth'], 'uses' => 'OauthController@postAuthorization', 'as' => 'oauth.authorization.post']);
$app->post('oauth/access-token', ['uses' => 'OauthController@postAccessToken', 'as' => 'oauth.access-token.post']);