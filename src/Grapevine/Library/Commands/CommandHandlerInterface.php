<?php

namespace FloatingPoint\Grapevine\Library\Commands;

interface CommandHandlerInterface
{
	function handle(CommandInterface $command);
} 
