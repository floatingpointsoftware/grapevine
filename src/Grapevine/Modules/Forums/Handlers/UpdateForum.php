<?php

namespace FloatingPoint\Grapevine\Modules\Forums\Handlers;

use FloatingPoint\Grapevine\Modules\Forums\Repositories\ForumRepositoryInterface;
use FloatingPoint\Grapevine\Library\Commands\Command;

class UpdateForum implements CommandHandler
{
    /**
     * @var ForumRepositoryInterface
     */
    private $Forums;

    public function __construct(ForumRepositoryInterface $Forums)
    {
        $this->Forums = $Forums;
    }

    /**
     * Handle the command, retrieving the forum and returning the result of the update operation
     *
     * @param Command $command
     * @return Resource
     */
    public function handle(Command $command)
    {
        $forum = $this->Forums->getById($command->id);

        return $this->Forums->update($forum, $command->attributes);
    }
} 
