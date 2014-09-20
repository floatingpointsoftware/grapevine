<?php

namespace FloatingPoint\Grapevine\Modules\Users\Commands;

use FloatingPoint\Grapevine\Library\Commands\Command;

/**
 * Class RegisterUserViaEmail
 *
 * Register a user based on their email and password credentials. This is the default
 * registration mechanism for all users.
 *
 * @package FloatingPoint\Grapevine\Modules\Users\Commands
 */
class RegisterUserViaEmail extends Command
{
	/**
	 * @var
	 */
	private $email;

	/**
	 * @var
	 */
	private $emailConfirmation;

	/**
	 * @var
	 */
	private $password;

	/**
	 * @var
	 */
	private $passwordConfirmation;

	public function __construct($email, $emailConfirmation, $password, $passwordConfirmation)
	{

		$this->email = $email;
		$this->emailConfirmation = $emailConfirmation;
		$this->password = $password;
		$this->passwordConfirmation = $passwordConfirmation;
	}
}
