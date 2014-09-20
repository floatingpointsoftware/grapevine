<?php 

namespace Tests\Stubs\Commands;

class CommandClient
{
    public function executeCommand($input)
    {
        return $this->execute(CommandInterfaceWithData::class, $input);
    }
} 
