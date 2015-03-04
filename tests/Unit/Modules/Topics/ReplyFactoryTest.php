<?php
namespace Tests\Unit\Modules\Topics;

use Tests\UnitTestCase;
use FloatingPoint\Grapevine\Modules\Topics\Data\ReplyFactory;
use Illuminate\Contracts\Support\Arrayable;
use FloatingPoint\Grapevine\Modules\Topics\Data\Reply;

class ReplyFactoryTest extends UnitTestCase
{
    protected $resource;
    
    public function setUp()
    {
        parent::setUp();
        $this->resource = new ReplyFactory();
    }

    /**
    * @test
    */
    public function instantiatesResource()
    {
        $this->assertInstanceOf(ReplyFactory::class, $this->resource);
    }

    /**
    * @test
    */
    public function factoryCreatesReplies()
    {
        $createdReply = $this->resource->create(1, 2, 'my title', 'my content');
        $this->assertEquals(1, $createdReply->topicId);
        $this->assertEquals(2, $createdReply->userId);
        $this->assertEquals('my title', $createdReply->title);
        $this->assertEquals('my content', $createdReply->content);
    }

    /**
    * @test
    */
    public function factoryCreatesRepliesFromArray()
    {
        $array = [
           'topic_id' => 1,
            'user_id' => 2,
            'title' => 'my title',
            'content' => 'my content'
        ];
        $arrayable = \Mockery::mock(Arrayable::class);
        $arrayable->shouldReceive('toArray')->andReturn($array);

        $createdReply = $this->resource->fromArray($arrayable);
        $this->assertEquals(1, $createdReply->topicId);
        $this->assertEquals(2, $createdReply->userId);
        $this->assertEquals('my title', $createdReply->title);
        $this->assertEquals('my content', $createdReply->content);

    }
}
