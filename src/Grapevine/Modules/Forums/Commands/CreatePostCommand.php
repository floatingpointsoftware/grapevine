<?php 
namespace FloatingPoint\Grapevine\Modules\Forums\Commands;

use FloatingPoint\Grapevine\Library\Support\Command;

class CreatePostCommand extends Command
{
    public $userId;
    public $topicId;
    public $subject;
    public $content;

    /**
     * @param $userId
     * @param $topicId
     * @param $subject
     * @param $content
     */
    public function __construct($userId, $topicId, $subject, $content)
    {
        $this->userId = $userId;
        $this->topicId = $topicId;
        $this->subject = $subject;
        $this->content = $content;
    }
}
