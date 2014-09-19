<?php

namespace FloatingPoint\Forum\Domain\Forums\Services;

use FloatingPoint\Forum\Domain\Forums\Commands\CreateForumCommand;
use Laracasts\Commander\CommanderTrait;

class ForumService
{
	use CommanderTrait;

	public function createForum(array $input = [])
	{
		$this->execute(CreateForumCommand::class, $input);
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
