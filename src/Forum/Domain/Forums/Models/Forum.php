<?php

namespace FloatingPointSoftware\Forum\Domain\Forums\Models;

class Forum extends \Eloquent
{
	public function create($name, $description)
	{
		$forum = new static(compact('name', 'description'));

		return $forum;
	}
}
