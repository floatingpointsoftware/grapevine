<?php 
namespace FloatingPoint\Grapevine\Modules\Discussions\Commands;

class ModifyDiscussionCommand
{
    public $title;
    public $discussionSlug;

    public function __construct($title, $discussionSlug)
    {
        $this->title = $title;
        $this->discussionSlug = $discussionSlug;
    }
}
