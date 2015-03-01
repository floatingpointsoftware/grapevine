<?php
namespace Tests\Unit\Modules\Categories;

use FloatingPoint\Grapevine\Modules\Categories\Data\Category;
use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryCollection;
use Illuminate\Support\Collection;
use Tests\Stubs\Modules\Categories\CategoryStub;
use Tests\Stubs\Modules\Topics\TopicStub;
use Tests\UnitTestCase;

class CategoryTest extends UnitTestCase
{
    protected $resource;
    
    public function setUp()
    {
        parent::setUp();
        $this->resource = new CategoryStub(['title' => 'My Category']);
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
    public function categoryGeneratesSlugFromTitle()
    {
        $this->resource->setSlugFromTitle();
        $this->assertEquals('my-category', $this->resource->slug->__toString());
    }
    
    /**
    * @test
    */
    public function categoryDeletesChildTopics()
    {
        $topic = new TopicStub();
        $category = new CategoryStub();
        $category->topics = new Collection([$topic]);
        $category->deleteTopics();
        $this->assertTrue($topic->deleted);

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

    /**
    * @test
    */
    public function convertsSlugToId()
    {
        $this->assertInstanceOf(Category::class, CategoryStub::slugToId('slug'));
    }
}
