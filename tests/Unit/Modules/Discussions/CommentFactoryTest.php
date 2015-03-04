<?php
namespace Tests\Unit\Modules\Topics;

use FloatingPoint\Grapevine\Modules\Discussions\Data\CommentFactory;
use Tests\UnitTestCase;
use Illuminate\Contracts\Support\Arrayable;

class CommentFactoryTest extends UnitTestCase
{
    protected $resource;
    
    public function init()
    {
        $this->resource = new CommentFactory;
    }

    /**
    * @test
    */
    public function factoryCreatesReplies()
    {
        $createdComment = $this->resource->create(1, 2, 'my title', 'my content');
        $this->assertEquals(1, $createdComment->discussionId);
        $this->assertEquals(2, $createdComment->userId);
        $this->assertEquals('my title', $createdComment->title);
        $this->assertEquals('my content', $createdComment->content);
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
