<?php

namespace FloatingPoint\Grapevine\Modules\Users\Services;

use FloatingPoint\Grapevine\Library\Commands\ValidationBus;
use FloatingPoint\Grapevine\Modules\Users\Commands\RegisterUserViaEmail;
use FloatingPoint\Grapevine\Modules\Users\Repositories\UserRepositoryInterface;

class UserService
{
	/**
	 * @var ValidationBus
	 */
	private $validationCommandBus;

	/**
	 * @var UserRepositoryInterface
	 */
	private $userRepository;

	/**
	 * @param ValidationBus $validationCommandBus
	 */
	public function __construct(ValidationBus $validationCommandBus, UserRepositoryInterface $userRepository)
	{
		$this->validationCommandBus = $validationCommandBus;
		$this->userRepository = $userRepository;
	}

	/**
	 * Search for a list of users, based on the search parameters.
	 *
	 * @param array $params
	 */
	public function getUsers(array $params = [])
	{

	}

	/**
	 * Get a user based on the id provided.
	 *
	 * @param int $id
	 * @return User
	 */
	public function getUserById(int $id)
	{
		return $this->userRepository->requireById($id);
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
