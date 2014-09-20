<?php

namespace Tests\Unit\Library\Commands;

use FloatingPoint\Grapevine\Library\Commands\Bus;
use Illuminate\Support\Facades\App;
use Tests\UnitTestCase;

class BusTest extends UnitTestCase
{
	public function testCommandExecution()
	{
		$commandBus = App::make(Bus::class);
		$command = new \Tests\Stubs\Commands\Command;

		$this->assertEquals('handler response', $commandBus->execute($command));
	}
}
