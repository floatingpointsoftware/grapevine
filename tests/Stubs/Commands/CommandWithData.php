<?php 

namespace Tests\Stubs\Commands;

use FloatingPoint\Grapevine\Library\Commands\Command;

class CommandWithData implements Command
{
    public $input;

    public function __construct($input)
    {
        $this->input = $input;
    }
} 
