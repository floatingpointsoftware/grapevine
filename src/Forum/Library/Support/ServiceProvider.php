<?php

namespace FloatingPoint\Forum\Library\Support;

use File;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

abstract class ServiceProvider extends IlluminateServiceProvider
{
	/**
	 * Aliases to be defined and set by the service provider.
	 *
	 * @var array
	 */
	protected $aliases = [];

	/**
	 * Service providers that this provider also manages.
	 *
	 * @var array
	 */
	protected $serviceProviders = [];

	/**
	 * Base register method. Simply registers the aliases and service providers defined
	 * by the service provider child class.
	 */
	public function register()
	{
		$this->registerServiceProviders();
		$this->registerAliases();
	}

	/**
	 * Register aliases
	 *
	 * @returns void
	 */
	protected function registerAliases()
	{
		$aliasLoader = AliasLoader::getInstance();

		foreach($this->aliases as $key => $value)
		{
			$aliasLoader->alias($key, $value);
		}
	}

	/**
	 * Register service providers defined by the class.
	 *
	 * @return void
	 */
	protected function registerServiceProviders()
	{
		foreach($this->serviceProviders as $provider)
		{
			$this->app->register($provider);
		}
	}
}
