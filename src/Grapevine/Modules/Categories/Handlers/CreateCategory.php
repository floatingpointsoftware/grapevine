<?php

namespace FloatingPoint\Grapevine\Modules\Categories\Handlers;

use FloatingPoint\Grapevine\Modules\Categories\ForumRepository;
use FloatingPoint\Grapevine\Modules\Categories\Repositories\CategoryRepositoryInterface;
use FloatingPoint\Grapevine\Library\Commands\CommandInterface;
use FloatingPoint\Grapevine\Modules\Categories\Models\Category;

class CreateCategory implements CommandHandler
{
    /**
     * @var ForumRepository
     */
    private $categoryRepository;

    /**
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Handle the command, creating a new forum record and returning the result.
     *
     * @param CommandInterface $command
     * @return Category
     */
    public function handle(CommandInterface $command)
    {
        $forum = $this->categoryRepository->getNew($command->data());

        return $this->categoryRepository->save($forum);
    }
}
