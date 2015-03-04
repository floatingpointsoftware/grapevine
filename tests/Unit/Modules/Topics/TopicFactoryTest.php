<?php
namespace Tests\Unit\Modules\Topics;

use FloatingPoint\Grapevine\Modules\Categories\Data\Category;
use FloatingPoint\Grapevine\Modules\Topics\Data\TopicFactory;
use Tests\UnitTestCase;

class TopicFactoryTest extends UnitTestCase
{
    protected $resource;
    
    public function setUp()
    {
        parent::setUp();
        $this->resource = new TopicFactory();
    }

    /**
    * @test
    */
    public function instantiatesResource()
    {
        $this->assertInstanceOf(TopicFactory::class, $this->resource);
    }

    /**
    * @test
    */
    public function factoryStartsTopics()
    {
        $category = new Category();
        $category->id = 1;
        $startedTopic = $this->resource->start($category, 5, 'my title');
        $this->assertEquals(5, $startedTopic->user_id);
        $this->assertEquals('my title', $startedTopic->title);
    }
}
