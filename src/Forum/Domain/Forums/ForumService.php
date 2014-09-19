<?php

namespace FloatingPointSoftware\Forum\Domain\Forums;

use Laracasts\Commander\CommanderTrait;

class ForumService
{
	use CommanderTrait;

	public function newForum(array $input = [])
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

	public function newThread(array $input = [])
	{

	}

	public function updateThread(array $input = [])
	{

	}

	public function deleteThread($threadId)
	{

	}

	public function moveThread($threadId, $forumId)
	{

	}

	public function getThread($threadId)
	{

	}
}
