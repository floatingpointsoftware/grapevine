<?php
namespace FloatingPoint\Grapevine\Modules\Discussions\Commands;

class StartDiscussionCommand
{
    public $category;
    public $title;
    public $body;

    public function __construct($category, $title, $body)
    {
        $this->category = $category;
        $this->title = $title;
        $this->body = $body;
    }
}
