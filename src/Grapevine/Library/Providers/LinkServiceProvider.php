<?php
namespace FloatingPoint\Grapevine\Library\Providers;

use FloatingPoint\Grapevine\Library\Support\Link;
use FloatingPoint\Grapevine\Modules\Categories\Data\Category;
use FloatingPoint\Grapevine\Modules\Discussions\Data\Discussion;
use Illuminate\Support\ServiceProvider;

class LinkServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('link', Link::class);
    }

    /**
     * Sets up the link/url index.
     */
    public function boot()
    {
        $this->app['link']->register([
            'category.browse' => function(Category $category) {
                return [$category];
            },
            'discussion.read' => function(Discussion $discussion) {
                return [$discussion->category, $discussion];
            },
            'discussion.start' => function(Category $category = null) {
                return [$category];
            }
        ]);
    }
}
