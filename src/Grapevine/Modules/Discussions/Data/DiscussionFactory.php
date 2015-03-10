<?php
namespace FloatingPoint\Grapevine\Modules\Discussions\Data;

use FloatingPoint\Grapevine\Modules\Discussions\Events\DiscussionWasStarted;

class DiscussionFactory
{
    /**
     *
     * Create a new discussion instance based on the required data.
     *
     * @param integer $categoryId
     * @param integer $userId
     * @param string  $title
     * @param string  $body
     * @return Discussion
     */
    public function start($categoryId, $userId, $title, $body)
    {
        $discussion = new Discussion;
        $discussion->categoryId = $categoryId;
        $discussion->userId = $userId;
        $discussion->title = $title;
        $discussion->body = $body;

        $discussion->raise(new DiscussionWasStarted($discussion));

        return $discussion;
    }
}
