<?php

namespace FloatingPoint\Forum\Domain\Forums\Events;

use FloatingPoint\Forum\Domain\Forums\Models\Forum;

class ForumWasCreated
{
	/**
	 * @var Forum
	 */
	private $forum;

	/**
	 * @param Forum $forum
	 */
	public function __construct(Forum $forum)
	{
		$this->forum = $forum;
	}
}
