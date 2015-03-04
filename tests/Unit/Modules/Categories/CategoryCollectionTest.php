<?php
namespace Tests\Unit\Modules\Categories;

use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryCollection;
use FloatingPoint\Grapevine\Modules\Categories\Data\Category;
use Tests\UnitTestCase;

class CategoryCollectionTest extends UnitTestCase
{
    protected $resource;
    
    public function setUp()
    {
        parent::setUp();
        $arr = [['title' => 'foo', 'id' => 1],['title' => 'bar', 'id' => 2],['title' => 'baz', 'id' => 3]];
        $cat1 = new Category(['title' => 'foo', 'id' => 5]);
        $cat2 = new Category(['title' => 'bar', 'id' => 7]);
        $cat3 = new Category(['title' => 'baz', 'id' => 7]);
        $this->resource = new CategoryCollection($arr);
        Category::unguard();
    }

    public function tearDown()
    {
        Category::reguard();
        parent::tearDown();
    }

    /**
    * @test
    */
    public function instantiatesResource()
    {
        $this->assertInstanceOf(CategoryCollection::class, $this->resource);
    }

    /**
    * @test
    */
    public function createsArrayForSelect()
    {
        $array = $this->resource->forSelect(1);
        $this->assertArrayHasValue('bar', $array);
        $this->assertArrayHasValue('baz', $array);
    }
}
