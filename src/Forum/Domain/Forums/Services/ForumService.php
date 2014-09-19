<?php

namespace FloatingPointSoftware\Forum\Domain\Forums\Services;

use FloatingPointSoftware\Forum\Domain\Forums\Commands\CreateForumCommand;
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
}
