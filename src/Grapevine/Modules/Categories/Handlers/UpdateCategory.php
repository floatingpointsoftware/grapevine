<?php

namespace FloatingPoint\Grapevine\Modules\Categories\Handlers;

use FloatingPoint\Grapevine\Modules\Categories\Repositories\CategoryRepositoryInterface;
use FloatingPoint\Grapevine\Library\Commands\Command;

class UpdateCategory implements CommandHandler
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categories;

    public function __construct(CategoryRepositoryInterface $forums)
    {
        $this->categories = $forums;
    }

    /**
     * Handle the command, retrieving the forum and returning the result of the update operation
     *
     * @param Command $command
     * @return Resource
     */
    public function handle(Command $command)
    {
        $forum = $this->categories->getById($command->id);

        return $this->categories->update($forum, $command->attributes);
    }
} 
