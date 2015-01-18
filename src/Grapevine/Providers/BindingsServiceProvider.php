<?php
namespace FloatingPoint\Grapevine\Providers;

use FloatingPoint\Grapevine\Modules\Categories\Repositories\CategoryRepositoryInterface;
use FloatingPoint\Grapevine\Modules\Categories\Repositories\EloquentCategoryRepository;
use FloatingPoint\Grapevine\Modules\Users\Repositories\EloquentUserRepository;
use FloatingPoint\Grapevine\Modules\Users\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class BindingsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(CategoryRepositoryInterface::class, EloquentCategoryRepository::class);
        $this->app->singleton(UserRepositoryInterface::class, EloquentUserRepository::class);
    }
}
