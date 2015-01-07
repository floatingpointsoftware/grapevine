<?php
namespace FloatingPoint\Grapevine\Modules\Users\Data;

use FloatingPoint\Grapevine\Library\Events\Raiseable;
use FloatingPoint\Grapevine\Library\Slugs\Sluggable;
use FloatingPoint\Grapevine\Modules\Users\Events\UserHasRegistered;

class User extends \Eloquent
{
    use Sluggable;
    use Raiseable;

	public $table    = 'users';
    public $fillable = ['username', 'email', 'password'];
    public $guarded  = ['id', 'password'];

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
        $user = new static;
        $user->fill(compact('username', 'email', 'password'));

        $user->raise(new UserHasRegistered($user));

        return $user;
    }
}
