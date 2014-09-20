<?php

namespace Tests\Unit\Library\Commands;

use FloatingPoint\Grapevine\Library\Commands\CommandBus;
use Illuminate\Support\Facades\App;
use Tests\UnitTestCase;

class CommandBusTest extends UnitTestCase
{
	public function testCommandExecution()
	{
		$commandBus = App::make(CommandBus::class);
		$command = new \Tests\Stubs\Commands\Command;

		$this->assertEquals('handler response', $commandBus->execute($command));
	}
}
