<?php
namespace FloatingPoint\Grapevine\Modules\Topics\Commands;

class StartTopicCommand
{
    public $categoryId;
    public $userId;
    public $title;

    function __construct($categoryId, $userId, $title, $description)
    {
        $this->categoryId = $categoryId;
        $this->userId = $userId;
        $this->title = $title;
    }
}
