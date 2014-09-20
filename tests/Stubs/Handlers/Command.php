<?php

namespace Tests\Stubs\Handlers;

use FloatingPoint\Grapevine\Library\Commands\CommandHandler;
use FloatingPoint\Grapevine\Library\Commands\CommandInterface;

class Command extends CommandHandler
{
	public function handle(CommandInterface $command)
	{
		return 'handler response';
	}
}
