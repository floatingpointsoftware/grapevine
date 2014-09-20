<?php

namespace FloatingPoint\Domain\Forums\Commands;

use FloatingPoint\Grapevine\Library\Commands\CommandInterface;

class DeleteForum implements CommandInterface
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function data()
    {
        return ['id' => $this->id];
    }
} 
