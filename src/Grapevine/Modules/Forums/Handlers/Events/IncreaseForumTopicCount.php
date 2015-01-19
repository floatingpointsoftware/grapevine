<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Handlers\Events;

use FloatingPoint\Grapevine\Modules\Forums\Events\TopicWasStarted;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\ForumRepositoryInterface;

class IncreaseForumTopicCount
{
	/**
	 * @var ForumRepositoryInterface
	 */
	private $forums;

	/**
	 * @param ForumRepositoryInterface $forums
     */
	function __construct(ForumRepositoryInterface $forums)
	{
		$this->forums = $forums;
	}

	/**
	 * @param TopicWasStarted $topic
     */
	public function handle(TopicWasStarted $topic)
	{
		$this->forums->increaseTopicCount($topic->forumId);
	}
}
