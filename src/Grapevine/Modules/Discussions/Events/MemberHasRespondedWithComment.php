<?php
namespace FloatingPoint\Grapevine\Modules\Discussions\Events;

use FloatingPoint\Grapevine\Modules\Discussions\Data\Comment;

class MemberHasRespondedWithComment
{
    /**
     * @var Comment
     */
    public $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }
}
