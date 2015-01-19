<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Commands;

class StartTopicCommand
{

    private $forumId;
    private $userId;
    private $title;
    private $description;

    function __construct($forumId, $userId, $title, $description)
    {
        $this->forumId = $forumId;
        $this->userId = $userId;
        $this->title = $title;
        $this->description = $description;
    }
}
