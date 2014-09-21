<?php 

namespace Tests\Stubs\Handlers;

use FloatingPoint\Grapevine\Library\Commands\CommandHandlerInterface;
use FloatingPoint\Grapevine\Library\Commands\CommandInterface;

class CommandWithData implements CommandHandlerInterface
{
    public function handle(CommandInterface $command)
    {
        return true;
    }
} 
