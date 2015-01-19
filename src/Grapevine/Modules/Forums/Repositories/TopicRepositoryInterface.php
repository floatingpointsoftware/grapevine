<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Repositories;

use FloatingPoint\Grapevine\Library\Database\RepositoryInterface;

interface TopicRepositoryInterface
{
    /**
     * Returns a collection of recent topics.
     *
     * @param null|integer $forumId
     * @return mixed
     */
    public function getRecent($forumId = null);
}
