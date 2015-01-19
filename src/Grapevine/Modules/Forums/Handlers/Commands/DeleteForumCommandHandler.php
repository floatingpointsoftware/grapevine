<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Handlers\Commands;

use FloatingPoint\Grapevine\Modules\Forums\Commands\DeleteForumCommand;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\ForumRepositoryInterface;

class DeleteForumCommandHandler
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
     * @param CommandInterface $command
     * @return bool
     */
    public function handle(DeleteForumCommand $command)
    {
        $forum = $this->forums->requireById($command->id);

        return $this->forums->delete($forum);
    }
} 
