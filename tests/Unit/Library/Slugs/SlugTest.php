<?php 
namespace Tests\Library\Slugs; 

use FloatingPoint\Grapevine\Library\Slugs\Slug;
use Tests\UnitTestCase;

class SlugTest extends UnitTestCase
{
    private $resource;

    public function setUp()
    {
        parent::setUp();
        $this->resource = new Slug('foo_bar_baz');
    }

    private function buildResourceWithId()
    {
        $this->resource = Slug::fromId(100);
    }

    private function buildResourceWithTitle()
    {
        $this->resource = Slug::fromTitle('My Title');
    }

    /**
    * @test
    */
    public function instantiatesResource()
    {
        $this->assertInstanceOf(Slug::class, $this->resource);
    }

    /**
    * @test
    */
    public function convertsToString()
    {
        $this->assertEquals('foo_bar_baz', $this->resource->__toString());
    }

    /**
    * @test
    */
    public function createsSlugFromId()
    {
        $this->buildResourceWithId();
        $this->assertEquals('AjvJgjaw', $this->resource->__toString());
    }

    /**
    * @test
    */
    public function createsSlugFromTitle()
    {
        $this->buildResourceWithTitle();
        $this->assertEquals('my-title', $this->resource->__toString());
    }
}
