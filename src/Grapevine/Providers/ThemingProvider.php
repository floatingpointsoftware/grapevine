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
    private $themePath = null;

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
            return [$this->themePath];
        });
    }

    /**
     * Tell Stylist about our default theme path and activate it.
     */
    public function setupTheme()
    {
        $this->themePath = __DIR__.'/../../../resources/theme/';
        $this->app['stylist']->registerPath($this->themePath, true);
    }
}
