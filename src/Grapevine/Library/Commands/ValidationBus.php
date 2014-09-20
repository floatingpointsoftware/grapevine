<?php

namespace FloatingPoint\Grapevine\Library\Commands;

use Illuminate\Console\Application;

class ValidationBus implements BusInterface
{
	/**
	 * @var Bus
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
	 * @param Bus $commandBus
	 */
	public function __construct(Bus $commandBus, Application $app, Translator $commandTranslator)
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

		$this->app->make($validator)
			->setInput($command->data())
			->validate();

		return $this->commandBus->execute($command);
	}
}
