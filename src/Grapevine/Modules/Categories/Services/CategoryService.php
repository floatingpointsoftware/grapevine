<?php

namespace FloatingPoint\Grapevine\Modules\Categories\Services;

use Event;
use FloatingPoint\Grapevine\Modules\Categories\Commands\CreateCategory;

/**
 * Class CategoryService
 * Manages the functionality specific to actions relating to forums. CRUD operations,
 * as well as moving, archiving, deletions, subscriptions.etc.
 *
 * @package FloatingPoint\Grapevine\Modules\Categories\Services
 */
class CategoryService
{
    /**
     * Execute the create forum command and return the response.
     *
     * @param array $input
     * @return mixed
     */
    public function createForum(array $input = [])
    {
        return $this->execute(CreateCategory::fromInput($input));
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
