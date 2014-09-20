<?php

namespace FloatingPoint\Grapevine\Modules\Users\Services;

use FloatingPoint\Grapevine\Library\Commands\ValidationBus;
use FloatingPoint\Grapevine\Modules\Users\Commands\RegisterUserViaEmail;

class UserService
{
	/**
	 * @var ValidationBus
	 */
	private $validationCommandBus;

	/**
	 * @param ValidationBus $validationCommandBus
	 */
	public function __construct(ValidationBus $validationCommandBus)
	{
		$this->validationCommandBus = $validationCommandBus;
	}

	/**
	 * Executes the correct registration command based on the type of registration
	 * that the user is making. Aka, facebook, twitter.etc.
	 *
	 * @param array $input
	 * @todo Implement registration methods via auth providers
	 */
	public function registerUser(array $input = [])
	{
		switch ($input['registrationMethod'])
		{
			default:
				return $this->validationCommandBus->execute(RegisterUserViaEmail::fromInput($input));
		}
	}
}
