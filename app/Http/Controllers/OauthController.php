<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use LucaDegasperi\OAuth2Server\Authorizer;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class OauthController extends BaseController
{
    /**
     * Serve authorization page
     * @param  Authorizer $authorizer
     * @return View response
     */
    public function getAuthorization(Authorizer $authorizer)
    {
        $authParams = $authorizer->getAuthCodeRequestParams();
        $formParams = array_except($authParams,'client');
        $formParams['client_id'] = $authParams['client']->getId();

        return view('auth.pages.authorization', ['params' => $formParams,'client' => $authParams['client']]);
    }

    /**
     * Perform resource owner authorization wheter approve or deny
     * @param  Authorizer $authorizer
     * @param  Guard      $auth
     * @param  Request    $request
     * @return Redirect response
     */
    public function postAuthorization(Authorizer $authorizer, Guard $auth, Request $request)
    {
        $params = $authorizer->getAuthCodeRequestParams();
        $params['user_id'] = $auth->user()->id;
        $redirectUri = '';

        // if the user has allowed the client to access its data, redirect back to the client with an auth code
        if ($request->input('approve') !== null) {
            $redirectUri = $authorizer->issueAuthCode('user', $params['user_id'], $params);
        }

        // if the user has denied the client to access its data, redirect back to the client with an error message
        if ($request->input('deny') !== null) {
            $redirectUri = $authorizer->authCodeRequestDeniedRedirectUri();
        }

        return redirect($redirectUri);
    }

    /**
     * Exchange client authorization code with authorization token
     * @param  Authorizer $authorizer
     * @return json
     */
    public function postAccessToken(Authorizer $authorizer)
    {
        return response()->json($authorizer->issueAccessToken());
    }
}