<?php
namespace FloatingPoint\Grapevine\Modules\Topics\Events;

use FloatingPoint\Grapevine\Modules\Topics\Data\Topic;

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
