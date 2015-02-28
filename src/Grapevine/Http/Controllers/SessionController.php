<?php namespace FloatingPoint\Grapevine\Http\Controllers;

use FloatingPoint\Grapevine\Library\Support\Controller;

class SessionController extends Controller
{
    private $auth;
    private $socialite;

    public function __construct(Authenticator $auth)
    {
        $this->auth = $auth;
    }

    public function create($method)
    {
        if ($method === 'email') {
            return $this->view('sessions.create');
        }

        //Handle everyone who wants to authenticate via oauth
        //scopes: ->driver($method)->scopes(['scope1','scope2'])->redirect();
        return $this->socialite->driver($method)->redirect();
    }

    public function store($method)
    {
        if ($method === 'email') {

        }
    }

    public function destroy()
    {

    }
}
