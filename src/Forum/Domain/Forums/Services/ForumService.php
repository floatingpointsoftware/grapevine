<?php

namespace FloatingPoint\Forum\Domain\Forums\Services;

use Event;
use FloatingPoint\Forum\Domain\Forums\Commands\CreateForum;
use FloatingPoint\Forum\Domain\Forums\Events\ForumWasCreated;
use Laracasts\Commander\CommanderTrait;

/**
 * Class ForumService
 *
 * Manages the functionality specific to actions relating to forums. CRUD operations,
 * as well as moving, archiving, deletions, subscriptions.etc.
 *
 * @package FloatingPoint\Forum\Domain\Forums\Services
 */
class ForumService
{
	use CommanderTrait;

	/**
	 * Execute the create forum command and return the response.
	 *
	 * @param array $input
	 * @return mixed
	 */
	public function createForum(array $input = [])
	{
		$forum = $this->execute(CreateForum::class, $input);

		Event::fire('forum.created'. [new ForumWasCreated($forum)]);
		
		return $forum;
	}

	public function updateForum(array $input = [])
	{

	}

	public function deleteForum($forumId)
	{

	}

	public function getForum($forumId)
	{

	}

	public function getForumList(array $params = [])
	{

	}
}
