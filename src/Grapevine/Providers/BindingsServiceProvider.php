<?php
namespace FloatingPoint\Grapevine\Providers;

use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryRepository;
use FloatingPoint\Grapevine\Modules\Categories\Data\EloquentCategoryRepository;
use FloatingPoint\Grapevine\Modules\Topics\Data\EloquentReplyRepository;
use FloatingPoint\Grapevine\Modules\Topics\Data\EloquentTopicRepository;
use FloatingPoint\Grapevine\Modules\Topics\Data\ReplyRepository;
use FloatingPoint\Grapevine\Modules\Topics\Data\TopicRepository;
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
        $this->app->singleton(CategoryRepository::class, EloquentCategoryRepository::class);
        $this->app->singleton(UserRepositoryInterface::class, EloquentUserRepository::class);
        $this->app->singleton(TopicRepository::class, EloquentTopicRepository::class);
        $this->app->singleton(ReplyRepository::class, EloquentReplyRepository::class);
    }
}
