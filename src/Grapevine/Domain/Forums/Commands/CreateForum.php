<?php

namespace FloatingPoint\Grapevine\Domain\Forums\Commands;

class CreateForum
{
    private $name;
    private $description;

    public function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }
}