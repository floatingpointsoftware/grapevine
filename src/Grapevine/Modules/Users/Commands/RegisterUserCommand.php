<?php
namespace FloatingPoint\Grapevine\Modules\Users\Commands;

use FloatingPoint\Grapevine\Library\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class RegisterUserCommand
 *
 * Register a user based on their email and password credentials. This is the default
 * registration mechanism for all users.
 *
 * @package FloatingPoint\Grapevine\Modules\Users\Commands
 */
class RegisterUserCommand extends Command
{
	public $username;
	public $email;
	public $emailConfirmation;
	public $password;
	public $passwordConfirmation;

	public function __construct($username, $email, $emailConfirmation, $password, $passwordConfirmation)
	{
		$this->email = $email;
		$this->emailConfirmation = $emailConfirmation;
		$this->password = $password;
		$this->passwordConfirmation = $passwordConfirmation;
		$this->username = $username;
	}
}
