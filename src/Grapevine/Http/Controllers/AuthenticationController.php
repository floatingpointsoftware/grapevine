<?php
namespace FloatingPoint\Grapevine\Http\Controllers;

use FloatingPoint\Grapevine\Http\Requests\Users\AuthenticateUserRequest;
use FloatingPoint\Grapevine\Library\Support\Controller;
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
            return redirect()->route('login.form')->with('error', 'Incorrect credentials. Please try again.');
        }
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        dd('wtf');
        Auth::logout();

        return redirect()->route('home');
    }
}
