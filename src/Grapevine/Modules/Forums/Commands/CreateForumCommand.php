<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Commands;

class CreateForumCommand
{
    public $parentId;
    public $title;
    public $description;

    function __construct($parent_id, $title, $description)
    {
        $this->parentId = $parent_id;
        $this->title = $title;
        $this->description = $description;
    }
}
