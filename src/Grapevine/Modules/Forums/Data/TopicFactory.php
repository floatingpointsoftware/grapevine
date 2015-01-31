<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Data;

use FloatingPoint\Grapevine\Modules\Forums\Events\TopicWasStarted;

class TopicFactory
{
    /**
     * Create a new topic instance based on the required data.
     *
     * @param integer $forumId
     * @param integer $userId
     * @param string $title
     * @return Topic
     */
    public function start($forumId, $userId, $title)
    {
        $topic = new Topic;
        $topic->forumId = $forumId;
        $topic->userId = $userId;
        $topic->title = $title;

        $topic->raise(new TopicWasStarted($topic));

        return $topic;
    }
}
