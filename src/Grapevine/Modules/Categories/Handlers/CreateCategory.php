<?php

namespace FloatingPoint\Grapevine\Modules\Categories\Handlers;

use FloatingPoint\Grapevine\Modules\Categories\ForumRepository;
use FloatingPoint\Grapevine\Modules\Categories\Repositories\CategoryRepositoryInterface;

class CreateCategory implements CommandHandler
{
    /**
     * @var ForumRepository
     */
    private $categoryRepository;

    /**
     * @param CategoryRepositoryInterface $forumRepository
     */
    public function __construct(CategoryRepositoryInterface $forumRepository)
    {
        $this->categoryRepository = $forumRepository;
    }

    /**
     * Handle the command, creating a new forum record and returning the result.
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $forum = $this->categoryRepository->getNew($command->name,
            $command->description);

        return $this->categoryRepository->save($forum);
    }
}
