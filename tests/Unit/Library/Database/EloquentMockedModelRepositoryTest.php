<?php
namespace tests\Unit\Library\Database;

use Mockery as m;
use Tests\Stubs\Library\Database\EloquentRepositoryStub;

class EloquentMockedModelRepositoryTest extends \Tests\UnitTestCase
{
    private $model;
    private $repository;

    public function init()
    {
        $this->model = m::mock('m');
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

    public function testCleanModelsShouldNotSave()
    {
        $mockRecord = m::mock('resource');
        $mockRecord->shouldReceive('getDirty')->once()->andReturn(false);
        $mockRecord->shouldReceive('touch')->once();
        $mockRecord->exists = true;

        $this->assertEquals($mockRecord, $this->repository->save($mockRecord));
    }
}
