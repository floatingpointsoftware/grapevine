<?php
namespace Tests\Unit\Library\Database;

use Mockery as m;
use Tests\Stubs\Library\Database\EloquentRepositoryStub;
use Tests\Stubs\Library\Database\RepositoryModelStub;

class EloquentRepositoryTest extends \Tests\UnitTestCase
{
    private $model;
    private $resource;

    public function init()
    {
        $this->model = new RepositoryModelStub();
        $this->resource= new EloquentRepositoryStub($this->model);
    }

    /**
    * @test
    */
    public function repositoryRetrievesAllEntries()
    {
        $this->assertCount(3, $this->resource->getAll());
    }

    /**
    * @test
    */
    public function repositorySetsAndGetsModel()
    {
        $this->assertInstanceOf(RepositoryModelStub::class, $this->resource->getModel());
        $this->resource->setModel('foo');
        $this->assertEquals('foo', $this->resource->getModel());
    }

    /**
    * @test
    */
    public function savesIfAttributesNotEmpty()
    {
        $this->model->setIsDirty(['title' => 'bar']);
        $this->assertInstanceOf(RepositoryModelStub::class, $this->resource->save($this->model));
    }

    /**
    * @test
    */
    public function repositorySavesCollectionOfModels()
    {
        $model1 = new RepositoryModelStub();
        $model2 = new RepositoryModelStub();
        $this->assertNull($this->resource->saveAll([$model1, $model2]));
        $this->assertNull($this->resource->saveAll($model1, $model2));
    }

    /**
    * @test
    * @expectedException \Illuminate\Database\Eloquent\ModelNotFoundException
    */
    public function repositoryThrowsExceptionWhenIdDoesntExist()
    {
        $this->resource->requiredIsFound = false;
        $this->resource->requireById(999);
    }

    /**
     * @test
     * @expectedException \Illuminate\Database\Eloquent\ModelNotFoundException
    */
    public function repositoryThrowsExceptionWhenRequiredFieldDoesntExist()
    {
        $this->resource->requiredIsFound = true;
        $result = $this->resource->requireBy('title', 999);
    }

    /**
    * @test
    */
    public function repositoryRequiresById()
    {
        $result = $this->resource->requireById(20);
        $this->assertEquals(1, $result);
    }

    /**
    * @test
    */
    public function repositoryRequiresByArbitraryField()
    {
        $result = $this->resource->requireBy('title', 'my title');
        $this->assertEquals(1, $result);
    }
}
