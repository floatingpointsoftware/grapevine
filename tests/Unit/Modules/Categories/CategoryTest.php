<?php
namespace Tests\Unit\Modules\Categories;

use FloatingPoint\Grapevine\Modules\Categories\Data\Category;
use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryCollection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\UnitTestCase;

class CategoryTest extends UnitTestCase
{
    protected $resource;
    
    public function setUp()
    {
        parent::setUp();
        $this->resource = new Category();
    }

    /**
    * @test
    */
    public function instantiatesResource()
    {
        $this->assertInstanceOf(Category::class, $this->resource);
    }

    /**
    * @test
    */
    public function categoryIsSluggable()
    {
        $this->assertRespondsTo(['setSlugAttribute', 'getSlugAttribute'], $this->resource);
    }

    /**
    * @test
    */
    public function categoryIsRaiseable()
    {
        $this->assertRespondsTo(['raise', 'releaseEvents'], $this->resource);
    }

    /**
    * @test
    */
    public function buildsCategoryCollection()
    {
        $this->assertInstanceOf(CategoryCollection::class, $this->resource->newCollection());
    }
}
