<?php

namespace FloatingPoint\Forum\Domain\Forums\Commands;

class CreateForumCommand
{
	private $name;
	private $description;

	public function __construct($name, $description)
	{
		$this->name = $name;
		$this->description = $description;
	}
}
