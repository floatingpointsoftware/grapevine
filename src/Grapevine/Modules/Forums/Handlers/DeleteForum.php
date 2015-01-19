<?php

namespace FloatingPoint\Grapevine\Modules\Forums\Handlers;

use FloatingPoint\Grapevine\Library\Commands\CommandInterface;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\ForumRepositoryInterface;

class DeleteForum implements CommandHandler
{
    /**
     * @var
     */
    private $Forums;

    /**
     * @param ForumRepositoryInterface $forums
     */
    public function __construct(ForumRepositoryInterface $forums)
    {
        $this->Forums = $forums;
    }

    /**
     * Handle the command, retrieving the forum and returning hte result of the delete operation
     *
     * @param CommandInterface $command
     * @return bool
     */
    public function handle(CommandInterface $command)
    {
        $forum = $this->Forums->getById($command->id);

        return $this->Forums->delete($forum);
    }
} 
