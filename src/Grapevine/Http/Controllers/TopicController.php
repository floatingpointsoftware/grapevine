<?php  namespace FloatingPoint\Grapevine\Http\Controllers; 

use FloatingPoint\Grapevine\Library\Support\Controller;
use FloatingPoint\Grapevine\Modules\Forums\Commands\StartTopicCommand;
use FloatingPoint\Grapevine\Modules\Forums\Data\Topic;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\ForumRepositoryInterface;
use FloatingPoint\Grapevine\Http\Requests\Forums\StartTopicRequest;

class TopicController extends Controller
{
    /**
     * @param ForumRepositoryInterface $forums
     */
    public function __construct(ForumRepositoryInterface $forums)
    {
        $this->forums = $forums;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create($forumSlug)
    {
        $forum = $this->forums->getBySlug($forumSlug);
        $topic = new Topic;
        $topic->forum()->associate($forum);

        return $this->respond('forum.topics.create', compact('topic'));
    }

    public function store(StartTopicRequest $request, $forumSlug)
    {
        $forum = $this->forums->getBySlug($forumSlug);

        $this->dispatch(new StartTopicCommand(
            $forum->id,
            1,
            $request->get('title'),
            $request->get('body')
            ));

        return redirect()->route('forum.show', [$forumSlug]);
    }
}
