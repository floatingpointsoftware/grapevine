<?php

namespace FloatingPoint\Grapevine\Library\Commands;

abstract class CommandHandler
{
    protected $response;

    public function __construct()
    {
        $this->response = new CommandResponse();
    }

    abstract function handle(Command $command);
} 
