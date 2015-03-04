<?php 
namespace FloatingPoint\Grapevine\Modules\Discussions\Commands;

class RespondToDiscussionCommand
{
    public $userId;
    public $discussionId;
    public $title;
    public $content;

    public function __construct($userId, $discussionId, $title, $content)
    {
        $this->userId = $userId;
        $this->discussionId = $discussionId;
        $this->title = $title;
        $this->content = $content;
    }
}
