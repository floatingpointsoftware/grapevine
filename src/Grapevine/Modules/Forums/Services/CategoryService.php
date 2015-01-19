<?php

namespace FloatingPoint\Grapevine\Modules\Forums\Services;

use Event;
use FloatingPoint\Grapevine\Modules\Forums\Commands\CreateForumCommand;

/**
 * Class ForumService
 * Manages the functionality specific to actions relating to forums. CRUD operations,
 * as well as moving, archiving, deletions, subscriptions.etc.
 *
 * @package FloatingPoint\Grapevine\Modules\Forums\Services
 */
class ForumService
{
    /**
     * Execute the create forum command and return the response.
     *
     * @param array $input
     * @return mixed
     */
    public function createForum(array $input = [])
    {
        return $this->execute(CreateForumCommand::fromInput($input));
    }

    public function updateForum(array $input = [])
    {
    }

    public function deleteForum($forumId)
    {
    }

    public function getForum($forumId)
    {
    }

    public function getForumList(array $params = [])
    {
    }
}
