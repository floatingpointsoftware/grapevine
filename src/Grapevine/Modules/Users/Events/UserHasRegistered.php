<?php
namespace FloatingPoint\Grapevine\Modules\Users\Events;

use FloatingPoint\Grapevine\Modules\Users\Data\User;

class UserHasRegistered
{
    /**
     * @var User
     */
    public $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
