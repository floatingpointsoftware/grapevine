<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Commands;

class StartTopicCommand
{
    public $forumId;
    public $userId;
    public $title;

    function __construct($forumId, $userId, $title, $description)
    {
        $this->forumId = $forumId;
        $this->userId = $userId;
        $this->title = $title;
    }
}
