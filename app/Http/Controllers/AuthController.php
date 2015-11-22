<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class AuthController extends BaseController
{
    /**
     * Get login page
     * @return View response
     */
    public function getLogin()
    {
        return view('auth.pages.login');
    }

    /**
     * Perform login action
     * @param  Request $request
     * @param  Guard   $auth
     * @return Redirect response
     */
    public function postLogin(Request $request, Guard $auth)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if($auth->attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {    
            $redirect = session('url.intended') ?: '/';
            
            return redirect($redirect);
        }

        return redirect('/login')->withInput($request->except('password'))
                                 ->with('error', 'Whoops! your credential doesn\'t math with our records');
    }

    /**
     * Logging out user
     * @param  Guard  $auth
     * @return Redirect response
     */
    public function getLogout(Guard $auth)
    {
        $auth->logout();

        return redirect('/');
    }
}
