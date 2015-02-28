<?php
namespace FloatingPoint\Grapevine\Modules\Topics\Data;

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
        $topic = new Topic([
            'category_id' => $categoryId,
            'user_id' => $userId,
            'title' => $title
        ]);

        $topic->raise(new TopicWasStarted($topic));

        return $topic;
    }
}
