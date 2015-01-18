<?php
namespace FloatingPoint\Grapevine\Providers;

class EventServiceProvider extends \Illuminate\Foundation\Support\Providers\EventServiceProvider
{
	protected $listen = [
        UserHasRegistered::class => [
            SendRegistrationEmail::class
        ]
    ];
}
