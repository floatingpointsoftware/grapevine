<?php

namespace FloatingPoint\Grapevine\Domain\Forums\Services;

use Event;
use FloatingPoint\Grapevine\Domain\Forums\Commands\CreateForum;
use Laracasts\Commander\CommanderTrait;

/**
 * Class ForumService
 *
 * Manages the functionality specific to actions relating to forums. CRUD operations,
 * as well as moving, archiving, deletions, subscriptions.etc.
 *
 * @package FloatingPoint\Grapevine\Domain\Forums\Services
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
		return $this->execute(CreateForum::class, $input);
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
