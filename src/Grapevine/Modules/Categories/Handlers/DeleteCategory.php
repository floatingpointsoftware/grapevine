<?php

namespace FloatingPoint\Grapevine\Modules\Categories\Handlers;

use FloatingPoint\Grapevine\Library\Commands\CommandInterface;
use FloatingPoint\Grapevine\Modules\Categories\Repositories\CategoryRepositoryInterface;

class DeleteCategory implements CommandHandler
{
    /**
     * @var
     */
    private $categories;

    /**
     * @param CategoryRepositoryInterface $forums
     */
    public function __construct(CategoryRepositoryInterface $forums)
    {
        $this->categories = $forums;
    }

    /**
     * Handle the command, retrieving the forum and returning hte result of the delete operation
     *
     * @param CommandInterface $command
     * @return bool
     */
    public function handle(CommandInterface $command)
    {
        $forum = $this->categories->getById($command->id);

        return $this->categories->delete($forum);
    }
} 
