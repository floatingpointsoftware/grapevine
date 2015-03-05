<?php
namespace FloatingPoint\Grapevine\Library\Providers;

class EventServiceProvider extends \Illuminate\Foundation\Support\Providers\EventServiceProvider
{
	protected $listen = [
        UserHasRegistered::class => [
            SendRegistrationEmail::class
        ]
    ];
}
