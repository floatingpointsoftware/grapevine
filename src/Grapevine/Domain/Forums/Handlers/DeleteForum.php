<?php 

namespace FloatingPoint\Domain\Forums\Handlers; 

use FloatingPoint\Grapevine\Domain\Forums\Repositories\ForumRepositoryInterface;
use FloatingPoint\Grapevine\Library\Commands\Command;

class DeleteForum
{
    /**
     * @var
     */
    private $forums;

    /**
     * @param ForumRepositoryInterface $forums
     */
    public function __construct(ForumRepositoryInterface $forums)
    {
        $this->forums = $forums;
    }

    /**
     * Handle the command, retrieving the forum and returning hte result of the delete operation
     *
     * @param Command $command
     * @return bool
     */
    public function handle(Command $command)
    {
        $forum = $this->forums->getById($command->id);
        return $this->forums->delete($forum);
    }
} 