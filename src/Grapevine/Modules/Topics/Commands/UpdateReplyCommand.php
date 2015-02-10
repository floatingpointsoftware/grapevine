<?php 
namespace FloatingPoint\Grapevine\Modules\Topics\Commands;

use FloatingPoint\Grapevine\Library\Support\Command;

class UpdateReplyCommand
{
    public $id;
    public $topicId;
    public $title;
    public $content;

    /**
     * @param $id
     * @param $topicId
     * @param $title
     * @param $comment
     */
    public function __construct($id, $topicId, $title, $content)
    {
        $this->id = $id;
        $this->topicId = $topicId;
        $this->title = $title;
        $this->content = $content;
    }

    public function toArray()
    {
        $props = get_object_vars($this);
        unset($props['id']);
        return $props;
    }
}
