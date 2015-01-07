<?php
namespace FloatingPoint\Http\Controllers;

use FloatingPoint\Grapevine\Library\Support\Controller;
use FloatingPoint\Grapevine\Modules\Users\Services\UserService;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Retrieve a list of users and return a view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = $this->userService->searchUsers(Request::all());

        return view('user.index', compact('users'));
    }

    /**
     * For modifying users, as an admin.
     *
     * @internal param CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {
        $this->dispatch(new CreateUserCommand);

        return redirectTo('home');
    }

    /**
     * Load the form necessary for editing a user.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = $this->userService->getUserById($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Renders a registration form for the user.
     *
     * @return \Illuminate\View\View
     */
    public function getRegister()
    {
        return view('user.register');
    }

	/**
	 * Handle the data passed in via the user for registration.
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
    public function postRegister()
    {
        $this->userService->registerUser(Request::all());

        return redirectTo('home');
    }
}
