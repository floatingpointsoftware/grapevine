<?php

namespace Tests\Stubs\Commands;

class CommandWithArguments extends \FloatingPoint\Grapevine\Library\Commands\Command
{
	public $name;
	public $address;

	public function __construct($name, $address)
	{
		$this->name = $name;
		$this->address = $address;
	}
}
