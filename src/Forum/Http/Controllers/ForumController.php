<?php

namespace FloatingPoint\Http\Controllers;

use FloatingPoint\Forum\Domain\Forums\Services\ForumService;
use FloatingPoint\Forum\Library\Support\Controller;
use Illuminate\Http\Request;

class ForumController extends Controller
{
	/**
	 * @var ForumService
	 */
	private $forumService;

	/**
	 * @var Request
	 */
	private $request;

	/**
	 * @param ForumService $forumService
	 * @param Request $request
	 */
	public function __construct(ForumService $forumService, Request $request)
	{
		$this->forumService = $forumService;
		$this->request = $request;
	}

	/**
	 * Retrieve a list of forums and return a view.
	 *
	 * @return mixed
	 */
	public function getIndex()
	{
		return View::make('forum:index', ['forums' => $this->forumService->getForumList($this->request->all())]);
	}
}
