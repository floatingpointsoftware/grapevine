<?php
namespace FloatingPoint\Grapevine\Providers;

use FloatingPoint\Stylist\Facades\Stylist;
use Illuminate\Support\ServiceProvider;

class ThemingProvider extends ServiceProvider
{
    /**
     * Stores the theme paths. Saves doing the discover call twice.
     *
     * @var array
     */
    private $themePaths = [];

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {}

    /**
     * Setup our themeing and publishing requirements with Stylist.
     */
    public function boot()
    {
        $this->setupTheme();

        $this->app['events']->listen('stylist.publishing', function() {
            return $this->themePaths;
        });
    }

    /**
     * Tell Stylist about our default theme path and activate it.
     */
    public function setupTheme()
    {
        $this->themePaths = $this->app['stylist']->discover(__DIR__.'/../views/');

        $this->app['stylist']->registerPaths($this->themePaths);
        $this->app['stylist']->activate($this->app['stylist']->get('Grapevine'));
    }
}
