<?php
namespace FloatingPoint\Grapevine\Modules\Topics\Commands;

class StartTopicCommand
{
    public $categoryId;
    public $userId;
    public $title;

    /**
     * @param integer $categoryId
     * @param integer $userId
     * @param string $title
     * @param string $description
     */
    public function __construct($categoryId, $userId, $title, $description)
    {
        $this->categoryId = $categoryId;
        $this->userId = $userId;
        $this->title = $title;
    }
}
