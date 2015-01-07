<?php
namespace FloatingPoint\Grapevine\Modules\Users;

use FloatingPoint\Grapevine\Library\Support\ServiceProvider;
use FloatingPoint\Grapevine\Modules\Users\Events\UserHasRegistered;
use FloatingPoint\Grapevine\Modules\Users\Handlers\Events\SendRegistrationEmail;
use FloatingPoint\Grapevine\Modules\Users\Repositories\EloquentUserRepository;
use FloatingPoint\Grapevine\Modules\Users\Repositories\UserRepositoryInterface;

class UsersServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Setup our required event listeners.
     *
     * @var array
     */
    protected $listen = [
       UserHasRegistered::class => SendRegistrationEmail::class
    ];

    /**
     * Aliases and bindings setup by the service provider.
     *
     * @var array
     */
    protected $aliases = [
        UserRepositoryInterface::class => EloquentUserRepository::class
    ];
}
