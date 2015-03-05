<?php
namespace FloatingPoint\Grapevine\Library\Providers;

use Eloquence\Behaviours\CountCache\CountCacheObserver;
use FloatingPoint\Grapevine\Modules\Discussions\Data\Comment;
use FloatingPoint\Grapevine\Modules\Discussions\Data\Discussion;
use Illuminate\Support\ServiceProvider;

/**
 * Class ObserverServiceProvider
 *
 * Grapevine has a number of observer registrations for its models, mostly provided
 * by the Eloquence library. This service provider simply allows us to register all
 * observers in one place.
 *
 * @package FloatingPoint\Grapevine\Library\Providers
 */
class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

    public function boot()
    {
        $countCacheObserver = $this->app->make(CountCacheObserver::class);

        Comment::observe($countCacheObserver);
        Discussion::observe($countCacheObserver);
    }
}
