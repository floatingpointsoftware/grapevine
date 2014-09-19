<?php

namespace FloatingPoint\Forum\Domain\Forums\Models;

class Forum extends \Eloquent
{
	/**
	 * @var array
	 */
	protected $fillable = ['name', 'description'];
}
