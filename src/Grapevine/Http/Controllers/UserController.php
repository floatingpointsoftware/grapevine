<?php

namespace FloatingPoint\Http\Controllers;

use FloatingPoint\Grapevine\Library\Support\Controller;
use FloatingPoint\Grapevine\Modules\Forums\Services\UserService;

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
	 * Generates the form required for user creation.
	 *
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		return view('user.form');
	}

    /**
     * For modifying users, as an admin.
     *
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {
        $this->userService->createUser(Request::all());

        return redirectTo('home');
    }

	/**
	 * Load the form necessary for editing a user.
	 *
	 * @param $id
	 */
	public function edit($id)
	{
		$user = $this->userService->getUserById($id);

		return view('user.form', compact($user));
	}

	/**
	 * Renders a registration form for the user.
	 *
	 * @return \Illuminate\View\View
	 */
	public function getRegister()
    {
		return view('user.form');
    }

	/**
	 * Handle the data passed in via the user for registration.
	 *
	 * @return Response
	 */
	public function postRegister()
	{
		$this->userService->registerUser(Request::all());

		return redirectTo('home');
	}
}
