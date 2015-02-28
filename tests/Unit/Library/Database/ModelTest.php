<?php 
namespace Tests\Unit\Library\Database;

use FloatingPoint\Grapevine\Library\Database\Model;
use Eloquence\Database\Traits\CamelCaseModel;
use Tests\UnitTestCase;

class ModelTest extends UnitTestCase
{
    private $resource;

    public function setUp()
    {
        parent::setUp();
        $this->resource = new Model();
    }

    /**
    * @test
    */
    public function instantiateResource()
    {
        $this->assertInstanceOf(Model::class, $this->resource);
    }

    /**
    * @test
    */
    public function modelUsesCamelCaseTrait()
    {
        $traits = class_uses($this->resource);
        $this->assertArrayHasKey(CamelCaseModel::class, $traits);
    }
}
