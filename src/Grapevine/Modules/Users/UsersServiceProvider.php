<?php

namespace FloatingPoint\Grapevine\Modules\Users;

use FloatingPoint\Grapevine\Library\Support\ServiceProvider;
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
     * Aliases and bindings setup by the service provider.
     *
     * @var array
     */
    protected $aliases = [
        UserRepositoryInterface::class => EloquentUserRepository::class
    ];
}
