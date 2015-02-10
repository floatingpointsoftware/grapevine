<?php
namespace FloatingPoint\Grapevine\Modules\Topics\Events;

use FloatingPoint\Grapevine\Modules\Topics\Data\Reply;

class TopicWasRepliedTo
{
    /**
     * @var Reply
     */
    private $post;

    public function __construct(Reply $post)
    {
        $this->post = $post;
    }
}
