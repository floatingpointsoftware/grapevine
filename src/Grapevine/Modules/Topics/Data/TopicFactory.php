<?php
namespace FloatingPoint\Grapevine\Modules\Topics\Data;

use FloatingPoint\Grapevine\Modules\Topics\Data\Topic;
use FloatingPoint\Grapevine\Modules\Topics\Events\TopicWasStarted;

class TopicFactory
{
    /**
     * Create a new topic instance based on the required data.
     *
     * @param integer $categoryId
     * @param integer $userId
     * @param string $title
     * @return Topic
     */
    public function start($categoryId, $userId, $title)
    {
        $topic = new Topic;
        $topic->categoryId = $categoryId;
        $topic->userId = $userId;
        $topic->title = $title;

        $topic->raise(new TopicWasStarted($topic));

        return $topic;
    }
}
