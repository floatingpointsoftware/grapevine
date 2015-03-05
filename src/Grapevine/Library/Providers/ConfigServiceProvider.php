<?php
namespace FloatingPoint\Grapevine\Library\Providers;

use Illuminate\Bus\Dispatcher;
use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Simply sets up the publishing of Grapevine configuration.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../../../resources/config/grapevine.php' => config_path('grapevine.php')
        ]);
    }
}
