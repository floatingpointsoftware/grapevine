<?php
namespace FloatingPoint\Grapevine\Http\Controllers;

use FloatingPoint\Grapevine\Http\Requests\Forums\CreateForumRequest;
use FloatingPoint\Grapevine\Library\Support\Controller;
use FloatingPoint\Grapevine\Modules\Forums\Commands\CreateForumCommand;
use FloatingPoint\Grapevine\Modules\Forums\Data\Forum;
use FloatingPoint\Grapevine\Modules\Forums\Repositories\ForumRepositoryInterface;

class ForumController extends Controller
{
    /**
     * @var ForumRepositoryInterface
     */
    private $forums;

    /**
     * @param ForumRepositoryInterface $forums
     */
    function __construct(ForumRepositoryInterface $forums)
    {
        $this->forums = $forums;
    }

    /**
     * Retrieve a list of forums and return a view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $forums = $this->forums->getAll();

        return $this->respond('forum.index', compact('forums'));
    }

    /**
     * Render the forum creation form.
     *
     * @return mixed
     */
    public function create()
    {
        $forum = new Forum;

        return $this->respond('forum.create', compact('forum'));
    }

    /**
     * Stores a new forum
     *
     * @param CreateForumRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateForumRequest $request)
    {
        $this->dispatch(new CreateForumCommand(
            $request->get('parent_id', null),
            $request->get('title'),
            $request->get('description')
        ));

        return redirect()->route('forum.index');
    }

    /**
     * Edit a specific forum based on its slug.
     *
     * @param string $slug
     * @return mixed
     */
    public function edit($slug)
    {
        $forum = $this->forums->requireBySlug($slug);

        return $this->respond('forum.edit', compact('forum'));
    }
}
