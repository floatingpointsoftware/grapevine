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

	/**
	 * Create a new forum model and persist it to the database.
	 *
	 * @param $name
	 * @param $description
	 * @return static
	 */
	public function createForum($name, $description)
	{
		$forum = new static(compact('name', 'description'));

		$forum->raise(new ForumWasCreated($forum));

		return $forum;
	}
}
