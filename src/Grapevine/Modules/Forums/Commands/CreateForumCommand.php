<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Commands;

class CreateForumCommand
{
    public $title;
    public $description;
    public $parentId;

    function __construct($title, $description, $parent_id)
    {
        $this->description = $description;
        $this->title = $title;
        $this->parentId = $parent_id;
    }
}
