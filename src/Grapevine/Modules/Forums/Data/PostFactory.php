<?php 
namespace FloatingPoint\Grapevine\Modules\Forums\Data;

use FloatingPoint\Grapevine\Modules\Forums\Events\PostWasAdded;

class PostFactory 
{
    /**
     * Blindly creates new post from Arrayable object
     *
     * @param Arrayable $command
     * @return Post
     */
    public function fromArray(Arrayable $command)
    {
        $post = new Post($command->toArray());
        $post->raise(new PostWasAdded($post));

        return $post;
    }

    /**
     * Creates a new post given topic & user IDs, title, and content
     *
     * @param $topicId
     * @param $userId
     * @param $title
     * @param $content
     * @return Post
     */
    public function create($topicId, $userId, $title, $content)
    {
        $post = new Post;
        $post->topicId = $topicId;
        $post->userId = $userId;
        $post->title = $title;
        $post->content = $content;

        $post->raise(new PostWasAdded($post));

        return $post;
    }
}
