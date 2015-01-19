<?php

namespace FloatingPoint\Grapevine\Modules\Forums\Commands;

use FloatingPoint\Grapevine\Library\Commands\Command;

class CreateForum extends Command
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
