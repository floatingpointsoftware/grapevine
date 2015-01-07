<?php

namespace FloatingPoint\Grapevine;

use FloatingPoint\Grapevine\Library\Commands\Translator;
use FloatingPoint\Grapevine\Library\Support\ServiceProvider;
use FloatingPoint\Grapevine\Modules\Categories\CategoriesServiceProvider;
use FloatingPoint\Grapevine\Modules\Users\UsersServiceProvider;
use Laracasts\Commander\CommanderServiceProvider;

class GrapevineServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

	/**
	 * Service providers Grapevine provides to the Laravel framework.
	 *
	 * @var array
	 */
	protected $serviceProviders = [
        CategoriesServiceProvider::class,
        UsersServiceProvider::class,
    ];

    /**
     * Sets up the routes required by the application.
     */
    public function register()
    {
        parent::register();

        require_once __DIR__ . '/Http/routes.php';
    }
}
