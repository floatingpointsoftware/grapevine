<?php

namespace FloatingPoint\Grapevine\Library\Commands;

use Illuminate\Console\Application;

class ValidationCommandBus implements CommandBusInterface
{
	/**
	 * @var CommandBus
	 */
	private $commandBus;

	/**
	 * @var Application
	 */
	private $app;

	/**
	 * @var Translator
	 */
	private $commandTranslator;

	/**
	 * @param CommandBus $commandBus
	 */
	public function __construct(CommandBus $commandBus, Application $app, Translator $commandTranslator)
	{
		$this->commandBus = $commandBus;
		$this->app = $app;
		$this->commandTranslator = $commandTranslator;
	}

	/**
	 * Executes the provided command.
	 *
	 * @param CommandInterface $command
	 * @return mixed
	 */
	public function execute(CommandInterface $command)
	{
		$validator = $this->commandTranslator->toValidator($command);

		$this->app->make($validator)->validate();
	}
}
