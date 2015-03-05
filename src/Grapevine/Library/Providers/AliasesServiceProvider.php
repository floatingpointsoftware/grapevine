<?php
namespace FloatingPoint\Grapevine\Library\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Html\FormFacade;
use Illuminate\Support\ServiceProvider;

class AliasesServiceProvider extends ServiceProvider
{
    /**
     * An array of aliases with the alias as the key and the concrete class as the value.
     *
     * @var array
     */
    protected $aliases = [
        'Avatar' => 'FloatingPoint\Grapevine\Library\Avatars\Facade',
        'Form' => 'Illuminate\Html\FormFacade',
    ];

    /**
     * Base register method. Simply registers the aliases and service providers defined
     * by the service provider child class.
     */
    public function register()
    {
        $aliasLoader = AliasLoader::getInstance();

        foreach ($this->aliases as $alias => $class) {
            $aliasLoader->alias($alias, $class);
        }
    }
}
