<?php

namespace FloatingPointSoftware\Forum\Domain\Forums;

use Laracasts\Commander\CommandHandler;

class NewForumCommandHandler implements CommandHandler
{
	/**
	 * @var ForumRepository
	 */
	private $forumRepository;

	/**
	 * @param ForumRepositoryInterface $forumRepository
	 */
	function __construct(ForumRepositoryInterface $forumRepository)
	{
		$this->forumRepository = $forumRepository;
	}

	public function handle($command)
	{
		$forum = $this->forumRepository->getNew($command->name, $command->description);

		return $this->forumRepository->save($forum);
	}
}
