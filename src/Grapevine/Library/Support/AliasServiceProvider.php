<?php
namespace FloatingPoint\Grapevine\Library\Support;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AliasServiceProvider extends ServiceProvider
{
    /**
     * Aliases to be defined and set by the service provider.
     *
     * @var array
     */
    protected $aliases = [];

    /**
     * Base register method. Simply registers the aliases and service providers defined
     * by the service provider child class.
     */
    public function register()
    {
        $aliasLoader = AliasLoader::getInstance();

        foreach ($this->aliases as $alias => $class) {
            $aliasLoader->alias($class, $alias);
        }
    }
}
