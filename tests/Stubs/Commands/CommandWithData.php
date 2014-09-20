<?php 

namespace Tests\Stubs\Commands;

use FloatingPoint\Grapevine\Library\Commands\CommandInterface;

class CommandInterfaceWithData implements CommandInterface
{
    public $input;

    public function __construct($input)
    {
        $this->input = $input;
    }
} 
