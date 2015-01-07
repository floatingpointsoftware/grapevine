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
	}

	protected function getPackageProviders($app)
	{
		return [
			'FloatingPoint\Grapevine\GrapevineServiceProvider'
		];
	}

	public function setUp()
	{
		parent::setUp();

		$this->init();
	}

	protected function init()
	{
		// Template method
	}
}