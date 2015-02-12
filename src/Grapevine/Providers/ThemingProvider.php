<?php
namespace FloatingPoint\Grapevine\Providers;

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
    }

    /**
     * Tell Stylist about our default theme path and activate it.
     */
    public function setupTheme()
    {
        $this->app['stylist']->registerPath(__DIR__.'/../../../resources/theme/', true);
    }
}
