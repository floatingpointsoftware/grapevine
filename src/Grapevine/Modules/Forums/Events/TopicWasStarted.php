<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Events;

use FloatingPoint\Grapevine\Modules\Forums\Data\Topic;

class TopicWasStarted
{
    /**
     * @var Topic
     */
    private $topic;

    /**
     * @param Topic $topic
     */
    function __construct(Topic $topic)
    {
        $this->topic = $topic;
    }
}
