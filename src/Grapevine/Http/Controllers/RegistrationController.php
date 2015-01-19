<?php
namespace FloatingPoint\Grapevine\Http\Controllers;

use FloatingPoint\Grapevine\Http\Requests\Forums\RegisterUserRequest;
use FloatingPoint\Grapevine\Library\Support\Controller;
use FloatingPoint\Grapevine\Modules\Users\Commands\RegisterUserCommand;

class RegistrationController extends Controller
{
    /**
     * Render the view for the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return $this->respond('registration.create');
    }

    /**
     * Creates a new register user command and dispatch.
     *
     * @param RegisterUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RegisterUserRequest $request)
    {
        $this->dispatch(
            new RegisterUserCommand(
                $request->get('username'),
                $request->get('email'),
                $request->get('email_confirmation'),
                $request->get('password'),
                $request->get('password_confirmation')
            )
        );

        return redirect()->route('home');
    }

    /**
     * URL that users will visit once they confirm their account.
     */
    public function confirm()
    {
        return redirect()->route('home');
    }
}
