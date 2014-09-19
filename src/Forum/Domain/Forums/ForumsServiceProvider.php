<?php

namespace FloatingPointSoftware\Forum\Domain\Forums;

use FloatingPointSoftware\Forum\Domain\Forums\Repositories\ForumRepositoryInterface;
use FloatingPointSoftware\Forum\Domain\Forums\Repositories\EloquentForumRepository;

class ForumsServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Aliases and bindings setup by the service provider.
	 *
	 * @var array
	 */
	protected $aliases = [
		ForumRepositoryInterface::class => EloquentForumRepository::class
	];
}
