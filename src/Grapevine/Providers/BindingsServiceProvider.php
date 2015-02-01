<?php
namespace FloatingPoint\Grapevine\Providers;

use FloatingPoint\Grapevine\Modules\Forums\Repositories\EloquentForumRepository;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\EloquentTopicRepository;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\ForumRepositoryInterface;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\TopicRepositoryInterface;
use FloatingPoint\Grapevine\Modules\Users\Repositories\EloquentUserRepository;
use FloatingPoint\Grapevine\Modules\Users\Repositories\UserRepositoryInterface;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\ReplyRepositoryInterface;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\EloquentReplyRepository;
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
        $this->app->singleton(ForumRepositoryInterface::class, EloquentForumRepository::class);
        $this->app->singleton(UserRepositoryInterface::class, EloquentUserRepository::class);
        $this->app->singleton(TopicRepositoryInterface::class, EloquentTopicRepository::class);
        $this->app->singleton(ReplyRepositoryInterface::class, EloquentReplyRepository::class);
    }
}
