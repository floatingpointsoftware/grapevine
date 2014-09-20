<?php

namespace FloatingPoint\Grapevine\Library\Commands;

interface CommandBusInterface
{
	/**
	 * Executes the provided command.
	 *
	 * @param CommandInterface $command
	 * @return mixed
	 */
	public function execute(CommandInterface $command);
} 
