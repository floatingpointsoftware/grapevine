<?php 

namespace FloatingPoint\Domain\Forums\Handlers;

use FloatingPoint\Grapevine\Domain\Forums\Repositories\ForumRepositoryInterface;
use FloatingPoint\Grapevine\Library\Commands\Command;

class UpdateForum
{
    /**
     * @var ForumRepositoryInterface
     */
    private $forums;

    public function __construct(ForumRepositoryInterface $forums)
    {
        $this->forums = $forums;
    }

    /**
     * Handle the command, retrieving the forum and returning the result of the update operation
     *
     * @param Command $command
     * @return Resource
     */
    public function handle(Command $command)
    {
        $forum = $this->forums->getById($command->id);
        return $this->forums->update($forum, $command->attributes);
    }
} 
