<?php
namespace FloatingPoint\Grapevine\Library\Providers;

use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryRepository;
use FloatingPoint\Grapevine\Modules\Categories\Data\EloquentCategoryRepository;
use FloatingPoint\Grapevine\Modules\Discussions\Data\EloquentCommentRepository;
use FloatingPoint\Grapevine\Modules\Discussions\Data\EloquentDiscussionRepository;
use FloatingPoint\Grapevine\Modules\Discussions\Data\CommentRepository;
use FloatingPoint\Grapevine\Modules\Discussions\Data\DiscussionRepository;
use FloatingPoint\Grapevine\Modules\Users\Data\EloquentUserRepository;
use FloatingPoint\Grapevine\Modules\Users\Data\UserRepository;
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
        $this->app->singleton(UserRepository::class, EloquentUserRepository::class);
        $this->app->singleton(DiscussionRepository::class, EloquentDiscussionRepository::class);
        $this->app->singleton(CommentRepository::class, EloquentCommentRepository::class);
    }
}
