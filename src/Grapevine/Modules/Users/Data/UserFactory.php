<?php
namespace FloatingPoint\Grapevine\Modules\Users\Data;

use FloatingPoint\Grapevine\Modules\Users\Events\UserHasRegistered;

class UserFactory
{
    /**
     * Create a new user instanc with the required data necessary for user registration.
     *
     * @param string $username
     * @param string $email
     * @param string $password
     * @return static
     */
    public static function register($username, $email, $password)
    {
        $user = new User;
        $user->fill(compact('username', 'email', 'password'));

        $user->raise(new UserHasRegistered($user));

        return $user;
    }
}
