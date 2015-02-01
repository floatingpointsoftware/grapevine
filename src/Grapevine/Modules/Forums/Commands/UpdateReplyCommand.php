<?php 
namespace FloatingPoint\Grapevine\Modules\Forums\Commands;

use FloatingPoint\Grapevine\Library\Support\Command;

class UpdateReplyCommand extends Command
{
    public $id;
    public $topicId;
    public $subject;
    public $comment;

    /**
     * @param $id
     * @param $topicId
     * @param $subject
     * @param $comment
     */
    public function __construct($id, $topicId, $subject, $comment)
    {
        $this->id = $id;
        $this->topicId = $topicId;
        $this->subject = $subject;
        $this->comment = $comment;
    }

}
