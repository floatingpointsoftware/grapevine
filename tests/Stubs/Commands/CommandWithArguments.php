<?php

namespace Tests\Stubs\Commands;

use FloatingPoint\Grapevine\Library\Commands\Command;

class CommandWithArguments extends Command
{
	public $name;
	public $address;

	public function __construct($name, $address)
	{
		$this->name = $name;
		$this->address = $address;
	}
}
