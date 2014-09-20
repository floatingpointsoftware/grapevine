<?php

namespace FloatingPoint\Grapevine;

use Authority\AuthorityL4\AuthorityL4ServiceProvider;
use FloatingPoint\Grapevine\Domain\Forums\ForumsServiceProvider;
use FloatingPoint\Grapevine\Library\Commands\Translator;
use FloatingPoint\Grapevine\Library\Support\ServiceProvider;
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
     * Defines the aliases that this service provider will setup.
     *
     * @var array
     */
    protected $aliases = [
        'Laracasts\CommanderCommandTranslator' => Translator::class
    ];

    protected $serviceProviders = [
        CommanderServiceProvider::class,
        ForumsServiceProvider::class,
        //Authority\AuthorityL4\AuthorityL4ServiceProvider::class
    ];

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('floatingpointsoftware/forum');
    }

    /**
     * Sets up the routes required by the application.
     */
    public function register()
    {
        parent::register();

        require_once __DIR__ . '/Http/routes.php';
    }
}