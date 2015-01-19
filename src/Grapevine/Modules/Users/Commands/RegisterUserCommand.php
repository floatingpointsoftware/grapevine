<?php
namespace FloatingPoint\Grapevine\Modules\Users\Commands;

use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class RegisterUserCommand
 *
 * Register a user based on their email and password credentials. This is the default
 * registration mechanism for all users.
 *
 * @package FloatingPoint\Grapevine\Modules\Users\Commands
 */
class RegisterUserCommand
{
	public $username;
	public $email;
	public $emailConfirmation;
	public $password;
	public $passwordConfirmation;

	public function __construct($username, $email, $email_confirmation, $password, $password_confirmation)
	{
		$this->email = $email;
		$this->emailConfirmation = $email_confirmation;
		$this->password = $password;
		$this->passwordConfirmation = $password_confirmation;
		$this->username = $username;
	}
}
