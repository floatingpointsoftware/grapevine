<?php 
namespace FloatingPoint\Grapevine\Modules\Topics\Data;

use FloatingPoint\Grapevine\Modules\Topics\Events\TopicWasRepliedTo;
use Illuminate\Contracts\Support\Arrayable;

class ReplyFactory
{
    /**
     * Blindly creates new post from Arrayable object
     *
     * @param Arrayable $command
     * @return Reply
     */
    public function fromArray(Arrayable $command)
    {
        $post = new Reply($command->toArray());
        $post->raise(new TopicWasRepliedTo($post));

        return $post;
    }

    /**
     * Creates a new post given topic & user IDs, title, and content
     *
     * @param $topicId
     * @param $userId
     * @param $title
     * @param $content
     * @return Reply
     */
    public function create($topicId, $userId, $title, $content)
    {
        $reply = new Reply;
        $reply->topicId = $topicId;
        $reply->userId = $userId;
        $reply->title = $title;
        $reply->content = $content;

        $reply->raise(new TopicWasRepliedTo($reply));

        return $reply;
    }
}
