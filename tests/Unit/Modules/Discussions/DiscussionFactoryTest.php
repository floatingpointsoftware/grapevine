<?php
namespace Tests\Unit\Modules\Topics;

use FloatingPoint\Grapevine\Modules\Categories\Data\Category;
use FloatingPoint\Grapevine\Modules\Discussions\Data\DiscussionFactory;
use Tests\UnitTestCase;

class DiscussionFactoryTest extends UnitTestCase
{
    protected $resource;
    
    public function init()
    {
        $this->resource = new DiscussionFactory();
    }

    /**
    * @test
    */
    public function factoryStartsDiscussions()
    {
        $category = new Category();
        $category->id = 1;
        $startedTopic = $this->resource->start($category, 5, 'my title');
        $this->assertEquals(5, $startedTopic->user_id);
        $this->assertEquals('my title', $startedTopic->title);
    }
}
