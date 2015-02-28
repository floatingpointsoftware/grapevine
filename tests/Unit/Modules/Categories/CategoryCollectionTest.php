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
        $cat1 = new Category(['title' => 'foo', 'id' => 5]);
        $cat2 = new Category(['title' => 'bar', 'id' => 7]);
        $cat3 = new Category(['title' => 'baz', 'id' => 7]);
        $this->resource = new CategoryCollection([$cat1, $cat2, $cat3]);
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
}
