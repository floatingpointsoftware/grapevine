<?php

namespace Tests\Unit\Library\Database;

use Mockery as m;
use Tests\Stubs\EloquentRepositoryStub;

class EloquentRepositoryTest extends \Tests\UnitTestCase
{
	private $model;
	private $repository;

	public function setUp()
	{
		parent::setUp();

		$this->model = m::mock('Model');
		$this->repository = new EloquentRepositoryStub($this->model);
	}

	public function testGetByIdShouldReturnASpecificRecord()
	{
		$mockRecord = m::mock('somemodel');

		$this->model->shouldReceive('where')->once()->with('id', '=', 1)->andReturn($this->model);
		$this->model->shouldReceive('first')->once()->andReturn($mockRecord);

		$this->assertEquals($mockRecord, $this->repository->getById(1));
	}

	public function testDeleteShouldRemoveAndReturnDeletedRecord()
	{
		$resource = m::mock('someobject');
		$resource->shouldReceive('delete')->once();

		$this->assertEquals($resource, $this->repository->delete($resource));
	}

	public function testDeleteRecordPermanently()
	{
		$resource = m::mock('someobject');
		$resource->shouldReceive('forceDelete')->once();

		$this->assertEquals($resource, $this->repository->delete($resource, true));
	}

	public function testGetNewShouldMakeAndReturnANewRecord()
	{
		$record = 'record';

		$this->model->shouldReceive('newInstance')->andReturn($record);

		$this->assertEquals($record, $this->repository->getNew());
	}

	public function testUpdateShouldSaveAndReturnExistingDirtyRecord()
	{
		$params = ['testParam' => 1];

		$foundRecord = m::mock('FoundRecord');

		$foundRecord->shouldReceive('fill')->once()->with($params);
		$foundRecord->shouldReceive('getDirty')->andReturn(true);
		$foundRecord->exists = true;
		$foundRecord->shouldReceive('save')->once();

		$this->assertEquals($foundRecord, $this->repository->update($foundRecord, $params));
	}

	public function testCleanModelsShouldNotSave()
	{
		$mockRecord = m::mock('resource');
		$mockRecord->shouldReceive('getDirty')->once()->andReturn(false);
		$mockRecord->shouldReceive('touch')->once();
		$mockRecord->exists = true;

		$this->assertEquals($mockRecord, $this->repository->save($mockRecord));
	}

	public function testUpdateShouldTouchAndReturnExistingCleanRecord()
	{
		$params = ['testParam' => 1];

		$foundRecord = m::mock('FoundRecord');
		$foundRecord->shouldReceive('fill')->with($params);
		$foundRecord->shouldReceive('touch');
		$foundRecord->shouldReceive('getDirty')->andReturn(false);
		$foundRecord->exists = true;

		$this->assertEquals($foundRecord, $this->repository->update($foundRecord, $params));
	}
}
