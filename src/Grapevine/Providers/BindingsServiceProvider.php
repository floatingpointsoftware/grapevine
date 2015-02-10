<?php
namespace FloatingPoint\Grapevine\Providers;

use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryRepositoryInterface;
use FloatingPoint\Grapevine\Modules\Categories\Data\EloquentCategoryRepository;
use FloatingPoint\Grapevine\Modules\Topics\Data\EloquentReplyRepository;
use FloatingPoint\Grapevine\Modules\Topics\Data\EloquentTopicRepository;
use FloatingPoint\Grapevine\Modules\Topics\Data\ReplyRepositoryInterface;
use FloatingPoint\Grapevine\Modules\Topics\Data\TopicRepositoryInterface;
use FloatingPoint\Grapevine\Modules\Users\Data\EloquentUserRepository;
use FloatingPoint\Grapevine\Modules\Users\Data\UserRepositoryInterface;
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
        $this->app->singleton(ReplyRepositoryInterface::class, EloquentReplyRepository::class);
    }
}
