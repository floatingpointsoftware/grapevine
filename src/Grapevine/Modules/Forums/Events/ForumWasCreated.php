<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Events;

use FloatingPoint\Grapevine\Modules\Forums\Data\Forum;

class ForumWasCreated
{
    /**
     * @var Forum
     */
    private $forum;

    /**
     * @param Forum $forum
     */
    public function __construct(Forum $forum)
    {
        $this->forum = $forum;
    }
}
