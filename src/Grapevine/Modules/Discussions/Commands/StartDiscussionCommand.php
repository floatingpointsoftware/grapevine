<?php
namespace FloatingPoint\Grapevine\Modules\Discussions\Commands;

class StartDiscussionCommand
{
    public $categoryId;
    public $title;
    public $comment;

    public function __construct($category_id, $title, $comment)
    {
        $this->categoryId = $category_id;
        $this->title = $title;
        $this->comment = $comment;
    }
}
