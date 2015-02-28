<?php 
namespace Tests\Library\Slugs;

use Tests\Stubs\Library\Slugs\SluggableStub;
use FloatingPoint\Grapevine\Library\Slugs\Slug;
use Tests\UnitTestCase;

class SluggableModelTest extends UnitTestCase
{
    private $resource;

    public function setUp()
    {
        parent::setUp();
        $this->resource = new SluggableStub();
    }

    /**
    * @test
    */
    public function instantiatesResource()
    {
        $this->assertInstanceOf(SluggableStub::class, $this->resource);
    }

    /**
    * @test
    */
    public function setsSlugAttribute()
    {
        $this->resource->setSlugAttribute(new Slug('My Title'));
        $this->assertEquals('My Title', $this->resource->attributes['slug']);
        $this->assertEquals('My Title', $this->resource->getSlugAttribute()->__toString());
    }
}
