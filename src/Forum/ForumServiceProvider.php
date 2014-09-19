<?php

namespace Floatingpointsoftware\Forum;

use FloatingPointSoftware\Forum\Domain\Forums\ForumsServiceProvider;
use FloatingPointSoftware\Library\Commands\CommandTranslator;
use FloatingPointSoftware\Library\Support\ServiceProvider;
use Laracasts\Commander\CommanderServiceProvider;

class ForumServiceProvider extends ServiceProvider
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
		'Laracasts\CommanderCommandTranslator' => CommandTranslator::class
	];

	protected $serviceProviders = [
		CommanderServiceProvider::class,
		ForumsServiceProvider::class
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

		require_once __DIR__.'/Http/routes.php';
	}
}
