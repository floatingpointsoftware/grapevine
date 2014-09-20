<?php

namespace FloatingPoint\Grapevine\Modules\Forums\Commands;

use FloatingPoint\Grapevine\Library\Commands\Command;

class DeleteForum extends Command
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
} 
