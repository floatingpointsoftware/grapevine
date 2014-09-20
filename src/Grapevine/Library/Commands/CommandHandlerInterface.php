<?php

namespace FloatingPoint\Grapevine\Library\Commands;

interface CommandHandlerInterface
{
    /**
     * Handle a command
     *
     * @param CommandInterface $command
     * @return mixed
     */
    function handle(CommandInterface $command);
} 
