<?php
namespace FloatingPoint\Grapevine\Library\Providers;

use FloatingPoint\Grapevine\Library\Avatars\Adapters\Gravatar;
use FloatingPoint\Grapevine\Library\Avatars\Manager;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Html\FormFacade;
use Illuminate\Support\ServiceProvider;

class AvatarServiceProvider extends ServiceProvider
{
    /**
     * Base register method. Simply registers the aliases and service providers defined
     * by the service provider child class.
     */
    public function register()
    {
        $this->app->singleton('avatar.manager', function($app) {
            $manager = new Manager;
            $manager->extend('gravatar', $app->make(Gravatar::class));
        });
    }
}
