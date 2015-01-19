<?php
namespace FloatingPoint\Grapevine\Http\Controllers;

use FloatingPoint\Grapevine\Http\Requests\Forums\AuthenticateUserRequest;
use FloatingPoint\Grapevine\Library\Support\Controller;
use FloatingPoint\Grapevine\Modules\Users\Commands\AuthenticateUserCommand;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    /**
     * Render the login form.
     *
     * @return mixed
     */
    public function form()
    {
        return $this->respond('authentication.login');
    }

    /**
     * Dispatch the authentication command.
     *
     * @param AuthenticateUserRequest $request
     */
    public function login(AuthenticateUserRequest $request)
    {
        $args = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        // Attempt authentication and remember the user
        $attempt = Auth::attempt($args, true);

        if ($attempt) {
            return redirect()->route('home');
        }
        else {
            return redirect()->route('login.form');
        }
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
