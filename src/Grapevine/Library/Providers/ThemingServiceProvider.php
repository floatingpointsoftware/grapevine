<?php
namespace FloatingPoint\Grapevine\Library\Providers;

use FloatingPoint\Grapevine\Library\Support\Links;
use FloatingPoint\Stylist\Facades\Stylist;
use Illuminate\Support\ServiceProvider;

class ThemingServiceProvider extends ServiceProvider
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
        $this->shareVars();
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
     * There are some variables we want available to all views. This method makes
     * those particular variables available for use.
     */
    protected function shareVars()
    {
        $this->app['view']->share('links', new Links);
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
