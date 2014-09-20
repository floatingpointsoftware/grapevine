<?php

namespace FloatingPoint\Grapevine\Library\Commands;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Logging\Log;

class Bus implements BusInterface
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @var Translator
     */
    protected $commandTranslator;

    /**
     * List of optional decorators for command bus.
     *
     * @var array
     */
    protected $decorators = [];

    /**
     * Logger instance.
     *
     * @var Log
     */
    private $log;

    /**
     * @param Application $app
     * @param Translator  $commandTranslator
     */
    public function __construct(Application $app, Translator $commandTranslator, Log $log)
    {
        $this->app = $app;
        $this->commandTranslator = $commandTranslator;
        $this->log = $log;
    }

    /**
     * Execute the command
     *
     * @param CommandInterface $command
     * @return mixed
     */
    public function execute(CommandInterface $command)
    {
        $handler = $this->commandTranslator->toCommandHandler($command);

        $this->log->info(get_class($command) . '.Executed', $command->data());

        return $this->app->make($handler)->handle($command);
    }
} 
