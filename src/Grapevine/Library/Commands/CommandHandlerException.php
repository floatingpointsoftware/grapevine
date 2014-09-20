<?php

namespace FloatingPoint\Grapevine\Library\Commands;

class CommandHandlerException extends \Exception
{
	public function __construct($handler)
	{
		$this->message = "Command handler [$handler] does not exist.";
	}
}
