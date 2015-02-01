<?php namespace FloatingPoint\Grapevine\Http\Controllers;

use FloatingPoint\Grapevine\Library\Support\Controller;
use FloatingPoint\Grapevine\Modules\Forums\Commands\StartTopicCommand;
use FloatingPoint\Grapevine\Modules\Forums\Data\Topic;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\ForumRepositoryInterface;
use FloatingPoint\Grapevine\Http\Requests\Forums\StartTopicRequest;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\TopicRepositoryInterface;

class TopicController extends Controller
{
    /**
     * @var TopicRepositoryInterface
     */
    private $topics;

    /**
     * @param TopicRepositoryInterface $topics
     * @internal param ForumRepositoryInterface $forums
     */
    public function __construct(TopicRepositoryInterface $topics)
    {
        $this->topics = $topics;
    }

    /**
     * @param string                   $forumSlug
     * @param ForumRepositoryInterface $forums
     * @return \Illuminate\View\View
     */
    public function create($forumSlug, ForumRepositoryInterface $forums)
    {
        $forum = $forums->getBySlug($forumSlug);
        $topic = new Topic;
        $topic->forum()->associate($forum);

        return $this->respond('forum.topics.create', compact('topic'));
    }

    public function store(StartTopicRequest $request, ForumRepositoryInterface $forums, $forumSlug)
    {
        $forum = $forums->getBySlug($forumSlug);

        $this->dispatch(new StartTopicCommand(
            $forum->id,
            1,
            $request->get('title'),
            $request->get('body')
        ));

        return redirect()->route('forum.show', [$forumSlug]);
    }

    public function edit($topicSlug)
    {
        $topic = $this->topics->getBySlug($topicSlug);

        return $this->respond('forum.topics.edit', compact('topic'));
    }

    public function update(UpdateTopicRequest $request, $topicSlug)
    {
        $this->dispatchFrom(UpdateTopicCommand::class, $request);

        return redirect()->back();
    }

    public function show($forumSlug, $topicSlug)
    {
        $topic = $this->topics->getBySlug($topicSlug);

        $topic->incrementViews();

        return $this->respond('forum.topics.show', compact('topic'));
    }

    public function destroy($topicSlug)
    {

    }
}
