<?php
namespace FloatingPoint\Grapevine\Modules\Discussions\Events;

use FloatingPoint\Grapevine\Modules\Discussions\Data\Discussion;

class DiscussionWasStarted
{
    /**
     * @var Discussion
     */
    public $discussion;

    /**
     * @param Discussion $discussion
     */
    function __construct(Discussion $discussion)
    {
        $this->discussion = $discussion;
    }
}
