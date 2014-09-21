<?php

namespace FloatingPoint\Grapevine\Modules\Categories;

use FloatingPoint\Grapevine\Library\Support\ServiceProvider;
use FloatingPoint\Grapevine\Modules\Categories\Repositories\EloquentForumRepository;
use FloatingPoint\Grapevine\Modules\Categories\Repositories\CategoryRepositoryInterface;

class CategoriesServiceProvider extends ServiceProvider
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
        CategoryRepositoryInterface::class => EloquentForumRepository::class
    ];
}
