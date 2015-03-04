<?php
namespace Tests\Unit\Modules\Categories;

use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryFactory;
use Tests\UnitTestCase;

class CategoryFactoryTest extends UnitTestCase
{
    protected $resource;
    
    public function setUp()
    {
        parent::setUp();
        $this->resource = new CategoryFactory();
    }

    /**
    * @test
    */
    public function instantiatesResources()
    {
        $this->assertInstanceOf(CategoryFactory::class, $this->resource);
    }

    /**
    * @test
    */
    public function factoryCreatesCategories()
    {
        $createdCategory = $this->resource->create('my title', 'my description');
        $this->assertEquals('my title', $createdCategory->title);
        $this->assertEquals('my description', $createdCategory->description);
    }
}
