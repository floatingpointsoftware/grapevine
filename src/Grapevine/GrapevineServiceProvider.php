<?php
namespace FloatingPoint\Grapevine;

use FloatingPoint\Grapevine\Providers\BindingsServiceProvider;
use FloatingPoint\Grapevine\Providers\ConsoleServiceProvider;
use FloatingPoint\Grapevine\Providers\EventServiceProvider;
use FloatingPoint\Stylist\Facades\Stylist;
use FloatingPoint\Stylist\StylistServiceProvider;
use Illuminate\Support\AggregateServiceProvider;

class GrapevineServiceProvider extends AggregateServiceProvider
{
	/**
	 * Service providers Grapevine provides to the Laravel framework.
	 *
	 * @var array
	 */
	protected $providers = [
        BindingsServiceProvider::class,
        ConsoleServiceProvider::class,
        EventServiceProvider::class,
        StylistServiceProvider::class,
    ];

    /**
     * Sets up the routes required by the application.
     */
    public function register()
    {
        parent::register();
        $this->registerViews();

        require_once __DIR__.'/Http/routes.php';
    }

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        $this->setupTheme();
    }

    /**
     * Register views
     *
     * @return void
     */
    protected function registerViews()
    {
        $this->app['view']->addLocation(__DIR__.'/../views');
    }

    /**
     * Tell Stylist about our default theme path and activate it.
     */
    public function setupTheme()
    {
        $paths = Stylist::discover(__DIR__.'/../views/');

        Stylist::registerPaths($paths);
        Stylist::activate(Stylist::get('Grapevine'));
    }
}
