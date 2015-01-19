<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Data;

use FloatingPoint\Grapevine\Modules\Forums\Events\TopicWasStarted;

class TopicFactory
{
	public function start($forumId, $userId, $title, $description)
    {
        $topic = new Topic;
        $topic->forumId = $forumId;
        $topic->userId = $userId;
        $topic->title = $title;
        $topic->description = $description;

        $topic->raise(new TopicWasStarted($topic));

        return $topic;
    }
}
