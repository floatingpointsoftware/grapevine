<?php

namespace FloatingPoint\Grapevine\Library\Commands;

abstract class CommandHandler
{
    protected $response;

    abstract function handle(CommandInterface $command);
} 
