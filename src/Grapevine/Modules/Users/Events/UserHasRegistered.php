<?php
namespace FloatingPoint\Grapevine\Modules\Users\Events;

use App\Events\Event;
use FloatingPoint\Grapevine\Modules\Users\Data\User;

class UserHasRegistered extends Event
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
