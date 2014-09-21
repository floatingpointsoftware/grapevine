<?php

namespace FloatingPoint\Grapevine\Modules\Categories\Commands;

use FloatingPoint\Grapevine\Library\Commands\Command;

class CreateCategory extends Command
{
    private $name;
    private $description;

    public function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }
}
