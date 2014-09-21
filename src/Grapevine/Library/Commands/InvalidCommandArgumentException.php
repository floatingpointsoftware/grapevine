<?php

namespace FloatingPoint\Grapevine\Library\Commands;

class InvalidCommandArgumentException extends \Exception
{
    public function __construct($command, $argument)
    {
        $this->message = "The argument [$argument] has not been provided as part of the input array and is required by $command::__construct";
    }
} 
