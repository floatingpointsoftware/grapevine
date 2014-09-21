<?php

namespace Tests\Stubs;

use FloatingPoint\Grapevine\Library\Database\EloquentRepository;

class EloquentRepositoryStub extends EloquentRepository
{
	public function __construct($model)
	{
		$this->model = $model;
	}
}
