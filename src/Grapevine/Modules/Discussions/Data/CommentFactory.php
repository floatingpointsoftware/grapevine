<?php 
namespace FloatingPoint\Grapevine\Modules\Discussions\Data;

use FloatingPoint\Grapevine\Modules\Discussions\Events\MemberHasRespondedWithComment;
use Illuminate\Contracts\Support\Arrayable;

class CommentFactory
{
    /**
     * Blindly creates new post from Arrayable object
     *
     * @param Arrayable $command
     * @return Comment
     */
    public function fromArray(Arrayable $command)
    {
        $post = new Comment($command->toArray());
        $post->raise(new MemberHasRespondedWithComment($post));

        return $post;
    }

    /**
     * Creates a new post given discussion & user IDs, title, and content
     *
     * @param $discussionId
     * @param $userId
     * @param $title
     * @param $content
     * @return Comment
     */
    public function create($discussionId, $userId, $title, $content)
    {
        $comment = new Comment;
        $comment->discussionId = $discussionId;
        $comment->userId = $userId;
        $comment->title = $title;
        $comment->content = $content;

        $comment->raise(new MemberHasRespondedWithComment($comment));

        return $comment;
    }
}
