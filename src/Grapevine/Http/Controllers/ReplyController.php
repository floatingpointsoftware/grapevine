<?php
namespace FloatingPoint\Grapevine\Http\Controllers;

use FloatingPoint\Grapevine\Library\Support\Controller;
use FloatingPoint\Grapevine\Http\Requests\Forums\ReplyToTopicRequest;
use FloatingPoint\Grapevine\Modules\Forums\Commands\ReplyToTopicCommand;
use FloatingPoint\Grapevine\Modules\Forums\Commands\UpdateReplyCommand;
use FloatingPoint\Grapevine\Modules\Forums\Data\Reply;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\ReplyRepositoryInterface;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\TopicRepositoryInterface;
use FloatingPoint\Grapevine\Http\Requests\Forums\UpdateReplyRequest;

class ReplyController extends Controller
{
    private $topics;

    public function __construct(TopicRepositoryInterface $topics, ReplyRepositoryInterface $replies)
    {
        $this->topics = $topics;
        $this->replies = $replies;
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

    public function edit($forumSlug, $topicSlug, $id)
    {
        $reply = $this->replies->getById($id);
        $topic = $this->topics->getBySlug($topicSlug);

        return $this->respond('forum.topics.replies.edit', compact('reply', 'topic'));
    }

    public function update(UpdateReplyRequest $request, $forumSlug, $topicSlug, $id)
    {
        $topic = $this->topics->getBySlug($topicSlug);
        $this->dispatch(new UpdateReplyCommand($id, $topic->id, $request->get('title'), $request->get('content')));

        return redirect()->route('forum.topics.show', [$forumSlug, $topicSlug]);
    }

    public function destroy($forumSlug, $topicSlug, $id)
    {
        $reply = $this->replies->getById($id);
        $this->replies->delete($reply);

        return redirect()->route('forum.topics.show', [$forumSlug, $topicSlug]);
    }
}
