<?php

namespace FloatingPoint\Http\Controllers;

use FloatingPoint\Forum\Domain\Forums\Services\ForumService;
use FloatingPoint\Forum\Http\Requests\CreateForumRequest;
use FloatingPoint\Forum\Library\Support\Controller;
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
	public function getIndex()
	{
		return view('forum.index', ['forums' => $this->forumService->getForumList($this->request->all())]);
	}

	public function postCreate(CreateForumRequest $request)
	{
		$forum = $this->forumService->createForum($request->all());

		return redirect();
	}
}
