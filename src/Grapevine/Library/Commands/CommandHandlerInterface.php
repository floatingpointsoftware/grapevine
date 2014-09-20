<?php

namespace FloatingPoint\Grapevine\Library\Commands;

interface CommandHandlerInterface
{
	/**
	 * The handle method should accept the command, and deal with the command by
	 * executing whatever functionality is required, based on the command's properties.
	 *
	 * @param CommandInterface $command
	 * @return mixed
	 */
	function handle(CommandInterface $command);
} 
