<?php

namespace Tests;

use Mockery as m;
use Orchestra\Testbench\TestCase;
use Route;

class UnitTestCase extends TestCase
{
	public function tearDown()
	{
		m::close();

		$this->response = null;
	}

	protected function getPackageProviders()
	{
		return [
			'FloatingPoint\Grapevine\GrapevineServiceProvider'
		];
	}

	protected function getPackageAliases()
	{
		return [
			'Validator' => 'Illuminate\Support\Facades\Validator'
		];
	}

	public function setUp()
	{
		parent::setUp();

		Route::disableFilters();
	}
}