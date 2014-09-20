<?php

namespace FloatingPoint\Http\Controllers;

use FloatingPoint\Grapevine\Domain\Forums\Services\UserService;
use FloatingPoint\Grapevine\Http\Requests\ListUsersRequest;
use FloatingPoint\Grapevine\Library\Support\Controller;

class UserController extends Controller
{
	/**
	 * @var ForumService
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
	public function index(ListUsersRequest $request)
	{
		return view('user.index', ['users' => $this->userService->getUserList($request->all())]);
	}

	/**
	 * For modifying users, as an admin.
	 *
	 * @param CreateUserRequest $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function store(CreateUserRequest $request)
	{
		$this->userService->createUser($request->all());

		return redirect('home');
	}

	public function register()
	{

	}
}
