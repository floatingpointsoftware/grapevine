<?php

namespace FloatingPoint\Forum\Domain\Forums\Models;

use Laracasts\Commander\Events\EventGenerator;

class Forum extends \Eloquent
{
	use EventGenerator;

	/**
	 * @var array
	 */
	protected $fillable = ['name', 'description'];
}
