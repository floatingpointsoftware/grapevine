<?php 

namespace FloatingPoint\Grapevine\Library\Commands;

interface TranslatorInterface
{
	/**
	 * Looks up the command handler fot the command.
	 *
	 * @param CommandInterface $command
	 * @return mixed
	 */
	public function toCommandHandler(CommandInterface $command);

	/**
	 * Looks up the validator for a givne command.
	 *
	 * @param CommandInterface $command
	 * @return mixed
	 */
	public function toValidator(CommandInterface $command);
} 
