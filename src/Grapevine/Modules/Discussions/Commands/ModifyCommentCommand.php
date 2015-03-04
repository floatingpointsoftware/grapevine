<?php 
namespace FloatingPoint\Grapevine\Modules\Discussions\Commands;

use FloatingPoint\Grapevine\Library\Support\Command;

class ModifyCommentCommand
{
    public $id;
    public $discussionId;
    public $title;
    public $content;

    public function __construct($id, $discussionId, $title, $content)
    {
        $this->id = $id;
        $this->discussionId = $discussionId;
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
