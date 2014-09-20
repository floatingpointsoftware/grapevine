<?php

namespace FloatingPoint\Grapevine\Library\Commands;

class HandlerException extends \Exception
{
	public function __construct($handler)
	{
		$this->message = "Command handler [$handler] does not exist.";
	}
}
