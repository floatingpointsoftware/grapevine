<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Handlers\Commands;

use FloatingPoint\Grapevine\Modules\Forums\Commands\UpdateForumCommand;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\ForumRepositoryInterface;

class UpdateForumCommandHandler
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
    public function handle(UpdateForumCommand $command)
    {
        $forum = $this->forums->getById($command->id);

        return $this->forums->update($forum, $command->attributes);
    }
} 
