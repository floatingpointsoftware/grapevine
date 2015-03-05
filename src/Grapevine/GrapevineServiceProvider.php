<?php
namespace FloatingPoint\Grapevine;

use FloatingPoint\Grapevine\Library\Providers\AliasesServiceProvider;
use FloatingPoint\Grapevine\Library\Providers\AvatarServiceProvider;
use FloatingPoint\Grapevine\Library\Providers\BindingsServiceProvider;
use FloatingPoint\Grapevine\Library\Providers\BusServiceProvider;
use FloatingPoint\Grapevine\Library\Providers\ConfigServiceProvider;
use FloatingPoint\Grapevine\Library\Providers\ConsoleServiceProvider;
use FloatingPoint\Grapevine\Library\Providers\EventServiceProvider;
use FloatingPoint\Grapevine\Library\Providers\ObserverServiceProvider;
use FloatingPoint\Grapevine\Library\Providers\ThemingProvider;
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
        AliasesServiceProvider::class,
        AvatarServiceProvider::class,
        BusServiceProvider::class,
        BindingsServiceProvider::class,
        ConsoleServiceProvider::class,
        ConfigServiceProvider::class,
        EventServiceProvider::class,
        ObserverServiceProvider::class,
        StylistServiceProvider::class,
        ThemingProvider::class,
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
