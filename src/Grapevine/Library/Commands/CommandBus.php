<?php

namespace FloatingPoint\Grapevine\Library\Commands;

use Illuminate\Contracts\Foundation\Application;

class CommandBus
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
     * @param Application $app
     * @param Translator $commandTranslator
     */
    function __construct(Application $app, Translator $commandTranslator)
    {
        $this->app = $app;
        $this->commandTranslator = $commandTranslator;
    }

    /**
     * Decorate the command bus with any executable actions.
     *
     * @param  string $className
     * @return mixed
     */
    public function decorate($className)
    {
        $this->decorators[] = $className;

        return $this;
    }

    /**
     * Execute the command
     *
     * @param $command
     * @return mixed
     */
    public function execute($command)
    {
        $this->executeDecorators($command);

        $handler = $this->commandTranslator->toCommandHandler($command);

        return $this->app->make($handler)->handle($command);
    }

    /**
     * Execute all registered decorators
     *
     * @param  object $command
     * @throws InvalidArgumentException
     * @return null
     */
    protected function executeDecorators($command)
    {
        foreach ($this->decorators as $className)
        {
            $instance = $this->app->make($className);

            if ( ! $instance instanceof CommandBusInterface)
            {
                $message = 'The class to decorate must be an implementation of FloatingPoint\Grapevine\Library\Commands\CommandBusInterface';

                throw new InvalidArgumentException($message);
            }

            $instance->execute($command);
        }
    }
} 
