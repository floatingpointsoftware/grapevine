<?php
namespace FloatingPoint\Grapevine\Modules\Users\Events;

use App\Events\Event;

class UserHasRegistered extends Event
{
    /**
     * @var User
     */
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}