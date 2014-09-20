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

    public function handle(Command $command)
    {
        $forum = $this->forums->getById($command->id);
        return $this->forums->update($forum, $command->attributes);
    }
} 
