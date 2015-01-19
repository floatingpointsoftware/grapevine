<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Commands;

class CreateForumCommand
{
    private $name;
    private $description;
    private $parent_id;

    function __construct($description, $name, $parent_id)
    {
        $this->description = $description;
        $this->name = $name;
        $this->parent_id = $parent_id;
    }
}
