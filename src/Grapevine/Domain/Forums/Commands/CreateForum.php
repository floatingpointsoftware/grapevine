<?php

namespace FloatingPoint\Grapevine\Domain\Forums\Commands;

use FloatingPoint\Grapevine\Library\Commands\CommandInterface;

class CreateForum implements CommandInterface
{
    private $name;
    private $description;

    public function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public function data()
    {
        return ['name' => $this->name, 'description' => $this->description];
    }
}
