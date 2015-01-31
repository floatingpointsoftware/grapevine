<?php
namespace FloatingPoint\Grapevine\Http\Controllers;

use FloatingPoint\Grapevine\Library\Support\Controller;
use FloatingPoint\Grapevine\Http\Requests\Forums\CreatePostRequest;
use FloatingPoint\Grapevine\Modules\Forums\Commands\CreatePostCommand;
use FloatingPoint\Grapevine\Modules\Forums\Data\Post;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\TopicRepositoryInterface;

class PostController extends Controller
{
    private $topics;

    public function __construct(TopicRepositoryInterface $topics)
    {
        $this->topics = $topics;
    }

    public function create($topicSlug)
    {
        $topic = $this->topics->getBySlug($topicSlug);
        $post = new Post;
        $post->topic()->associate($topic);

        return $this->respond('forum.posts.create', compact('post'));
    }

    public function store(CreatePostRequest $request, $forumSlug, $topicSlug)
    {
        $topic = $this->topics->getBySlug($topicSlug);

        $this->dispatch(new CreatePostCommand(
            1,
            $topic->id,
            $request->get('subject'),
            $request->get('content')
        ));
    }
}
