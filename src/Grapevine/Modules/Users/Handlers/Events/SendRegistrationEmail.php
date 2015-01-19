<?php
namespace FloatingPoint\Grapevine\Modules\Users\Handlers\Events;

use FloatingPoint\Grapevine\Modules\Users\Events\UserHasRegistered;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class SendRegistrationEmail implements ShouldBeQueued
{
    /**
     * @param UserHasRegistered $event
     */
    public function handle(UserHasRegistered $event)
    {

    }
}
