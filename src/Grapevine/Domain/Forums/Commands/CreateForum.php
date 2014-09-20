<?php

namespace FloatingPoint\Grapevine\Domain\Forums\Commands;

use FloatingPoint\Grapevine\Library\Commands\Command;

class CreateForum implements Command
{
    private $name;
    private $description;

    public function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }
}
