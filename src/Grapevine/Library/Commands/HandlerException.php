<?php

namespace FloatingPoint\Grapevine\Library\Commands;

class HandlerException extends \Exception
{
    /**
     * @param string $handler
     */
    public function __construct($handler)
    {
        $this->message = "Command handler [$handler] does not exist.";
    }
}
