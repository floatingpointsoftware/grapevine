<?php 

namespace Tests\Stubs\Commands;

use FloatingPoint\Grapevine\Library\Commands\CommandBusTrait;

class CommandClient
{
    use CommandBusTrait;

    public function executeCommand($input)
    {
        return $this->execute(CommandWithData::class, $input);
    }
} 
