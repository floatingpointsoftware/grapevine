<?php
namespace FloatingPoint\Grapevine\Modules\Users\Data;

use FloatingPoint\Grapevine\Library\Database\EloquentRepository;

class EloquentUserRepository extends EloquentRepository implements UserRepository
{
    /**
     * Setup the required model object for eloquent repositories.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * Require a user record based on the email provided.
     *
     * @param string $email
     * @return mixed
     */
    public function getByEmail($email)
    {
        $users = $this->getBy('email', $email);

        if (count($users) == 1) {
            return $users[0];
        }

        return false;
    }
}
