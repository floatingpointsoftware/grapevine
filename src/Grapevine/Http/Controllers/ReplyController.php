<?php
namespace FloatingPoint\Grapevine\Http\Controllers;

use FloatingPoint\Grapevine\Library\Support\Controller;
use FloatingPoint\Grapevine\Http\Requests\Forums\ReplyToTopicRequest;
use FloatingPoint\Grapevine\Modules\Forums\Commands\ReplyToTopicCommand;
use FloatingPoint\Grapevine\Modules\Forums\Data\Reply;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\TopicRepositoryInterface;

class ReplyController extends Controller
{
    private $topics;

    public function __construct(TopicRepositoryInterface $topics)
    {
        $this->topics = $topics;
    }

    public function create($forumSlug, $topicSlug)
    {
        $topic = $this->topics->getBySlug($topicSlug);
        $reply = new Reply;
        $reply->topic()->associate($topic);

        return $this->respond('forum.topics.replies.create', compact('reply', 'topic'));
    }

    public function store(ReplyToTopicRequest $request, $forumSlug, $topicSlug)
    {
        $topic = $this->topics->getBySlug($topicSlug);

        $this->dispatch(new ReplyToTopicCommand(
            1,
            $topic->id,
            $request->get('title'),
            $request->get('content')
        ));
    }
}
