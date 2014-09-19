<?php

namespace FloatingPoint\Forum\Domain\Forums\Handlers;

use FloatingPointSoftware\Forum\Domain\Forums\ForumRepository;
use FloatingPointSoftware\Forum\Domain\Forums\Repositories\ForumRepositoryInterface;
use Laracasts\Commander\CommandHandler;

class CreateForumCommandHandler implements CommandHandler
{
	/**
	 * @var ForumRepository
	 */
	private $forumRepository;

	/**
	 * @param \FloatingPoint\Forum\Domain\Forums\Repositories\ForumRepositoryInterface $forumRepository
	 */
	function __construct(ForumRepositoryInterface $forumRepository)
	{
		$this->forumRepository = $forumRepository;
	}

	/**
	 * Handle the command, creating a new forum record and returning the result.
	 *
	 * @param $command
	 * @return mixed
	 */
	public function handle($command)
	{
		$forum = $this->forumRepository->getNew($command->name, $command->description);

		return $this->forumRepository->save($forum);
	}
}
