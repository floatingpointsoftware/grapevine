<?php 
namespace FloatingPoint\Grapevine\Modules\Topics\Commands;

class ReplyToTopicCommand
{
    public $userId;
    public $topicId;
    public $title;
    public $content;

    /**
     * @param $userId
     * @param $topicId
     * @param $title
     * @param $content
     */
    public function __construct($userId, $topicId, $title, $content)
    {
        $this->userId = $userId;
        $this->topicId = $topicId;
        $this->title = $title;
        $this->content = $content;
    }
}
