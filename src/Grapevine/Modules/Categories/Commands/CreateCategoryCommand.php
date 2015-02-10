<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Commands;

class CreateCategoryCommand
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
