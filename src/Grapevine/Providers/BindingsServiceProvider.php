<?php
namespace FloatingPoint\Grapevine\Providers;

use FloatingPoint\Grapevine\Modules\Categories\Repositories\CategoryRepositoryInterface;
use FloatingPoint\Grapevine\Modules\Categories\Repositories\EloquentCategoryRepository;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\EloquentTopicRepository;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\TopicRepositoryInterface;
use FloatingPoint\Grapevine\Modules\Users\Repositories\EloquentUserRepository;
use FloatingPoint\Grapevine\Modules\Users\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Class BindingsServiceProvider
 *
 * This service provider is responsible only for setting up the various simple bindings necessary for
 * such features as repository bindings, aliases.etc.
 *
 * @package FloatingPoint\Grapevine\Providers
 */
class BindingsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(CategoryRepositoryInterface::class, EloquentCategoryRepository::class);
        $this->app->singleton(UserRepositoryInterface::class, EloquentUserRepository::class);
        $this->app->singleton(TopicRepositoryInterface::class, EloquentTopicRepository::class);
    }
}
