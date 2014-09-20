<?php

namespace FloatingPoint\Http\Controllers;

use FloatingPoint\Grapevine\Domain\Forums\Services\ForumService;
use FloatingPoint\Grapevine\Http\Requests\Forums\CreateForumRequest;
use FloatingPoint\Grapevine\Library\Support\Controller;
use Illuminate\Http\Request;

class ForumController extends Controller
{
	/**
	 * @var ForumService
	 */
	private $forumService;

	/**
	 * @param ForumService $forumService
	 */
	public function __construct(ForumService $forumService)
	{
		$this->forumService = $forumService;
	}

	/**
	 * Retrieve a list of forums and return a view.
	 *
	 * @return mixed
	 */
	public function index()
	{
		return view('forum.index', ['forums' => $this->forumService->getForumList($this->request->all())]);
	}

	public function store(CreateForumRequest $request)
	{
		$forum = $this->forumService->createForum($request->all());

		return redirect();
	}
}