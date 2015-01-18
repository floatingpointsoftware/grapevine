<?php
namespace FloatingPoint\Grapevine\Providers;

use FloatingPoint\Grapevine\Console\InstallGrapevineCommand;
use FloatingPoint\Grapevine\Console\MigrateGrapevineCommand;
use Illuminate\Support\ServiceProvider;

class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * Only bother registering when we actually need consoel commands.
     *
     * @var bool
     */
    public $defer = true;

    /**
     * Nothing is needed for this particular provider during registration
     */
	public function register() {}

    /**
     * Setup grapevine's console commands.
     */
    public function boot()
    {
        $this->app->bind('command.grapevine.install', InstallGrapevineCommand::class);
        $this->commands('command.grapevine.install');

        $this->app->bind('command.grapevine.migrate', MigrateGrapevineCommand::class);
        $this->commands('command.grapevine.migrate');
    }

    /**
     * Let laravel know what commands/bindings are available to the system.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'command.grapevine.migrate',
        ];
    }
}
