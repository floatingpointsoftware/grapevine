<?php

namespace FloatingPoint\Http\Controllers;

use FloatingPoint\Grapevine\Domain\Forums\Services\UserService;
use FloatingPoint\Grapevine\Http\Requests\ListUsersRequest;
use FloatingPoint\Grapevine\Library\Support\Controller;
use Illuminate\Http\Request;

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
	 * @return mixed
	 */
	public function index()
	{
		return view('user.index', ['users' => $this->userService->getUserList($this->request->all())]);
	}

	public function store(CreateForumRequest $request)
	{
		$user = $this->userService->createForum($request->all());

		return redirect();
	}
}
