<?php

namespace FloatingPointSoftware\Forum\Domain\Forums;

class NewForumCommand
{
	private $name;
	private $description;

	public function __construct($name, $description)
	{
		$this->name = $name;
		$this->description = $description;
	}
}
