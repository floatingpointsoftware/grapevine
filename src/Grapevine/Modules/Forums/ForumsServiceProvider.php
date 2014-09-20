<?php

namespace FloatingPoint\Grapevine\Modules\Forums;

use FloatingPoint\Grapevine\Library\Support\ServiceProvider;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\EloquentForumRepository;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\ForumRepositoryInterface;

class ForumsServiceProvider extends ServiceProvider
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
        ForumRepositoryInterface::class => EloquentForumRepository::class
    ];
}
