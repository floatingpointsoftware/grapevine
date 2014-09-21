<?php

namespace Tests\Unit\Library\Commands;

use FloatingPoint\Grapevine\Library\Commands\Translator;
use Tests\Stubs\Commands\Command;
use Tests\Stubs\Commands\CommandWithoutHandler;

class TranslatorTest extends \Tests\UnitTestCase
{
	public function testToValidator()
	{
		$this->assertEquals('Tests\Stubs\Validators\Command', (new Translator)->toValidator(new Command));
	}

	public function testToHandlerWithValidCommandHandler()
	{
		$this->assertEquals('Tests\Stubs\Handlers\Command', (new Translator)->toCommandHandler(new Command));
	}

	/**
	 * @expectedException \FloatingPoint\Grapevine\Library\Commands\HandlerException
	 * @expectedExceptionMessage Command handler [Tests\Stubs\Handlers\CommandWithoutHandler] does not exist.
	 */
	public function testToHandlerWithoutValidCommandHandler()
	{
		(new Translator)->toCommandHandler(new CommandWithoutHandler);
	}
}
