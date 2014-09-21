<?php

namespace FloatingPoint\Grapevine\Modules\Categories\Commands;

use FloatingPoint\Grapevine\Library\Commands\Command;

class DeleteCategory extends Command
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
} 
