<?php

namespace FloatingPoint\Grapevine\Library\Commands;

use ReflectionClass;

trait CommandBusTrait
{
    protected function execute($command, array $input = null, $decorators = [])
    {
        $input = $input ?: \Input::all();

        $command = $this->mapInputToCommand($command, $input);

        $bus = $this->getCommandBus();

        foreach($decorators as $decorator) {
            $bus->decorate($decorator);
        }

        return $bus->execute($command);
    }

    public function getCommandBus()
    {
        return \App::make('FloatingPoint\Grapevine\Library\Commands\CommandBus');
    }

    /**
     * Map an array of input to a command's properties.
     *
     * @param  string $command
     * @param  array $input
     * @throws InvalidArgumentException
     * @author Taylor Otwell
     *
     * @return mixed
     */
    protected function mapInputToCommand($command, array $input)
    {
        $dependencies = [];

        $class = new ReflectionClass($command);

        foreach ($class->getConstructor()->getParameters() as $parameter)
        {
            $name = $parameter->getName();

            if (array_key_exists($name, $input))
            {
                $dependencies[] = $input[$name];
            }
            elseif ($parameter->isDefaultValueAvailable())
            {
                $dependencies[] = $parameter->getDefaultValue();
            }
            else
            {
                throw new InvalidArgumentException("Unable to map input to command: {$name}");
            }
        }

        return $class->newInstanceArgs($dependencies);
    }
} 
