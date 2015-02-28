<?php
namespace FloatingPoint\Grapevine\Http\Controllers;

use FloatingPoint\Grapevine\Library\Support\Controller;
use FloatingPoint\Grapevine\Http\Requests\Topics\ReplyToTopicRequest;
use FloatingPoint\Grapevine\Http\Requests\Topics\UpdateReplyRequest;
use FloatingPoint\Grapevine\Modules\Topics\Commands\ReplyToTopicCommand;
use FloatingPoint\Grapevine\Modules\Topics\Commands\UpdateReplyCommand;
use FloatingPoint\Grapevine\Modules\Topics\Data\Reply;
use FloatingPoint\Grapevine\Modules\Topics\Data\ReplyRepositoryInterface;
use FloatingPoint\Grapevine\Modules\Topics\Data\TopicRepositoryInterface;

class ReplyController extends Controller
{
    private $topics;
    private $replies;

    public function __construct(TopicRepositoryInterface $topics, ReplyRepositoryInterface $replies)
    {
        $this->topics = $topics;
        $this->replies = $replies;
    }

    public function create($categorySlug, $topicSlug)
    {
        $topic = $this->topics->getBySlug($topicSlug);
        $reply = new Reply;
        $reply->topic()->associate($topic);

        return $this->respond('category.topics.replies.create', compact('reply', 'topic'));
    }

    public function store(ReplyToTopicRequest $request, $categorySlug, $topicSlug)
    {
        $topic = $this->topics->getBySlug($topicSlug);

        $this->dispatch(new ReplyToTopicCommand(
            1,
            $topic->id,
            $request->get('title'),
            $request->get('content')
        ));
    }

    public function edit($categorySlug, $topicSlug, $id)
    {
        $reply = $this->replies->getById($id);
        $topic = $this->topics->getBySlug($topicSlug);

        return $this->respond('category.topics.replies.edit', compact('reply', 'topic'));
    }

    public function update(UpdateReplyRequest $request, $categorySlug, $topicSlug, $id)
    {
        $topic = $this->topics->getBySlug($topicSlug);
        $this->dispatch(new UpdateReplyCommand($id, $topic->id, $request->get('title'), $request->get('content')));

        return redirect()->route('category.topics.show', [$categorySlug, $topicSlug]);
    }

    public function destroy($categorySlug, $topicSlug, $id)
    {
        $reply = $this->replies->getById($id);
        $this->replies->delete($reply);

        return redirect()->route('category.topics.show', [$categorySlug, $topicSlug]);
    }
}
