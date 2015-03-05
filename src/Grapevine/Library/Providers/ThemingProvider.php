<?php
namespace FloatingPoint\Grapevine\Library\Providers;

use FloatingPoint\Stylist\Facades\Stylist;
use Illuminate\Support\ServiceProvider;

class ThemingProvider extends ServiceProvider
{
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
        $this->requireMacros();
    }

    /**
     * Tell Stylist about our default theme path and activate it.
     */
    public function setupTheme()
    {
        $this->app['stylist']->registerPath(__DIR__.'/../../../../resources/theme/', true);
    }

    /**
     * Grapevine comes bundled with a handful of HTML macros to help with building
     * your forum implementations - mainly just helpers for otherwise more verbose tasks.
     */
    public function requireMacros()
    {
        require __DIR__.'/../Html/macros.php';
    }
}
