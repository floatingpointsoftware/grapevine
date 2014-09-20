<?php

namespace FloatingPoint\Grapevine\Library\Commands;

interface BusInterface
{
    /**
     * Executes the provided command.
     *
     * @param CommandInterface $command
     * @return mixed
     */
    public function execute(CommandInterface $command);
} 
