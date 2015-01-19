<?php

namespace FloatingPoint\Grapevine\Modules\Forums\Repositories;

use FloatingPoint\Grapevine\Library\Database\RepositoryInterface;

interface ForumRepositoryInterface
{
    /**
     * Increases the topic count for a given forum.
     *
     * @param integer $forumId
     */
    public function increaseTopicCount($forumId);
}
