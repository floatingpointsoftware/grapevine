<?php
namespace Tests\Unit\Modules\Categories;

use FloatingPoint\Grapevine\Modules\Categories\Data\Category;
use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryCollection;
use Illuminate\Support\Collection;
use Tests\Stubs\Modules\Categories\CategoryStub;
use Tests\Stubs\Modules\Discussions\DiscussionStub;
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
    public function categoryDeletesChildTopics()
    {
        $discussion = new DiscussionStub();
        $category = new CategoryStub();
        $category->discussions = new Collection([$discussion]);
        $category->deleteDiscussions();
        $this->assertTrue($discussion->deleted);

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
