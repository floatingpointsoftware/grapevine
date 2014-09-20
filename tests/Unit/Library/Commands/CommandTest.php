<?php

namespace Tests\Unit\Library\Commands;

use Tests\Stubs\Commands\CommandWithArguments;

class CommandTest extends \Tests\UnitTestCase
{
	public function setUp()
	{
		$this->command = new CommandWithArguments('Kirk', 'Home');
	}

	public function testHandlerAndValidatorRetrieval()
	{
		$this->assertNull($this->command->getCommandHandler());
		$this->assertNull($this->command->getValidator());
	}

	public function testCommandInstantiationViaInput()
	{
		$command = CommandWithArguments::fromInput(['name' => 'Someone', 'address' => 'Over there']);

		$this->assertEquals('Someone', $command->name);
		$this->assertEquals('Over there', $command->address);
	}

	/**
	 * @expectedException FloatingPoint\Grapevine\Library\Commands\InvalidCommandArgumentException
	 * @throws \FloatingPoint\Grapevine\Library\Commands\InvalidCommandArgumentException
	 * @throws \FloatingPoint\Grapevine\Library\Commands\NullCommandConstructorException
	 */
	public function testCommandInstantiationWithInvalidInput()
	{
		CommandWithArguments::fromInput(['Someone', 'Over there']);
	}
}
