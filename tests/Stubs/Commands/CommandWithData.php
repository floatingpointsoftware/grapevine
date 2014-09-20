<?php 

namespace Tests\Stubs\Commands;

use FloatingPoint\Grapevine\Library\Commands\Command;

class CommandInterfaceWithData extends Command
{
    public $input;

    public function __construct($input)
    {
        $this->input = $input;
    }
} 
