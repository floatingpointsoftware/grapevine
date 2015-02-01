<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Events;

use FloatingPoint\Grapevine\Modules\Forums\Data\Reply;

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
