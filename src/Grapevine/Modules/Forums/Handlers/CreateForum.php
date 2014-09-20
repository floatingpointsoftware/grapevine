<?php

namespace FloatingPoint\Grapevine\Modules\Forums\Handlers;

use FloatingPointSoftware\Grapevine\Modules\Forums\ForumRepository;
use FloatingPointSoftware\Grapevine\Modules\Forums\Repositories\ForumRepositoryInterface;

class CreateForum implements CommandHandler
{
    /**
     * @var ForumRepository
     */
    private $forumRepository;

    /**
     * @param \FloatingPoint\Grapevine\Modules\Forums\Repositories\ForumRepositoryInterface $forumRepository
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
