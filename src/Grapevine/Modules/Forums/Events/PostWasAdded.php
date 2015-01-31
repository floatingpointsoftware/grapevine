<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Events;

use FloatingPoint\Grapevine\Modules\Forums\Data\Post;

class PostWasAdded 
{
    /**
     * @var Post
     */
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}
