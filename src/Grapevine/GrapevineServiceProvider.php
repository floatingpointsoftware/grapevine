<?php
namespace FloatingPoint\Grapevine;

use FloatingPoint\Grapevine\Providers\BindingsServiceProvider;
use FloatingPoint\Grapevine\Providers\ConsoleServiceProvider;
use FloatingPoint\Grapevine\Providers\EventServiceProvider;
use FloatingPoint\Grapevine\Providers\ThemingProvider;
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
        ThemingProvider::class
    ];

    /**
     * Sets up the routes required by the application.
     */
    public function register()
    {
        parent::register();

        require_once __DIR__.'/Http/routes.php';
        require_once __DIR__.'/View/composers.php';
    }
}
