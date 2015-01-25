<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Data;

use FloatingPoint\Grapevine\Modules\Forums\Events\ForumWasCreated;

class ForumFactory
{
    /**
     * Create a new forum object with the required data.
     *
     * @param string $title
     * @param string $description
     * @return Forum
     */
    public function create($title, $description)
    {
        $forum = new Forum;
        $forum->title = $title;
        $forum->description = $description;

        $forum->raise(new ForumWasCreated($forum));

        return $forum;
    }
}
