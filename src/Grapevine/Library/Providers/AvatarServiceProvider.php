<?php
namespace FloatingPoint\Grapevine\Library\Providers;

use FloatingPoint\Grapevine\Library\Avatars\Adapters\Gravatar;
use FloatingPoint\Grapevine\Library\Avatars\Manager;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Html\FormFacade;
use Illuminate\Support\ServiceProvider;

class AvatarServiceProvider extends ServiceProvider
{
    public $defer = true;

    /**
     * Base register method. Simply registers the aliases and service providers defined
     * by the service provider child class.
     */
    public function register()
    {
        $this->app->singleton('avatar', function($app) {
            $driver = config('grapevine.avatar.driver', 'gravatar');

            $manager = new Manager($driver);
            $manager->extend('gravatar', $app->make(Gravatar::class));

            return $manager;
        });
    }

    /**
     * We only have one binding that we need to provide.
     *
     * @return array
     */
    public function provides()
    {
        return ['avatar'];
    }
}
