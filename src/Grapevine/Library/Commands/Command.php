<?php

namespace FloatingPoint\Grapevine\Library\Commands;

/**
 * Class Command
 *
 * Base command class.
 *
 * @package FloatingPoint\Grapevine\Library\Commands
 */
abstract class Command implements CommandInterface
{
	/**
	 * Handler class. Convention stipulates that the handler will be found in the Handlers directory
	 * one up from the Commands directory within the namespace. However, you may want a handler
	 * or a validator to be found elsewhere. You can specify them here.
	 *
	 * @var string
	 */
	protected $handler = null;

	/**
	 * String for the validator class.
	 *
	 * @var string
	 */
	protected $validator = null;

	/**
	 * Basic method to return properties that were assigned to the command upon instantiation.
	 *
	 * @return array
	 */
	public function data()
	{
		return get_object_vars($this);
	}

	/**
	 * @return string
	 */
	public function getCommandHandler()
	{
		return $this->handler;
	}

	/**
	 * @return string
	 */
	public function getValidator()
	{
		return $this->validator;
	}

	/**
	 * Constructs a new instance of the command based on the input array provided. It will
	 * look at the constructor, and figure out which arguments to pass in.
	 *
	 * @param array $input
	 */
	public static function fromInput(array $input = [])
	{
		$reflector = new \ReflectionClass(static::class);
		$constructor = $reflector->getConstructor();

		if (is_null($constructor)) {
			throw new NullCommandConstructorException;
		}

		$constructorArguments = [];

		$method = $reflector->getMethod('__construct');
		$params = $method->getParameters();

		foreach ($params as $param) {
			$parameter = $param->getName();

			if (isset($input[$parameter])) {
				$constructorArguments[] = $input[$parameter];
			}
		}

		return $reflector->newInstanceArgs($constructorArguments);
	}
}
